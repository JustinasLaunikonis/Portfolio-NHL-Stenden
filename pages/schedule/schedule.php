<?php
    require_once '../../components/layout.php';

    $faviconPath = $relativePrefix . "assets/sidebar/schedule.png";
    
    $calendarUrl = "https://nhlstenden.myx.nl/api/InternetCalendar/feed/f4306384-8089-4db7-b316-2bc6bcdb07a5/673927df-a658-4e17-8f0a-3aac27d75ff9";
    
    $calendarData = null;
    $errorMessage = null;
    
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $calendarUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        
        $calendarData = curl_exec($ch);
        
        if (curl_errno($ch)) {
            $errorMessage = curl_error($ch);
        }
        
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - <?php echo $pageTitle; ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo $faviconPath; ?>">

    <link rel="stylesheet" href="<?php echo $relativePrefix; ?>style.css">
    <link rel="stylesheet" href="schedule.css">
</head>
<body>
    <?php
    renderHeader($pageTitle);
    renderSidebar($navigation, $navigationLink, $navigationLogo, $currentPage, $versionName, $version, $buildDate, $versionLink, $relativePrefix);
    ?>
    
    <div class="calendar-container">
        <div id="calendar">
            <?php if ($errorMessage): ?>
                <p style="color: #ff6b6b;">Error loading calendar: <?php echo htmlspecialchars($errorMessage); ?></p>
            <?php else: ?>
                <div class="calendar-header">
                    <h2 id="weekRange">Loading...</h2>
                    <div class="calendar-nav">
                        <button id="prevWeek">←</button>
                        <button id="nextWeek">→</button>
                    </div>
                </div>
                <div id="calendarGrid"></div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/ical.js@1.5.0/build/ical.min.js"></script>
    <script>
        <?php if ($calendarData): ?>
        const calendarData = <?php echo json_encode($calendarData); ?>;
        let currentWeekStart = new Date();
        currentWeekStart.setDate(currentWeekStart.getDate() - currentWeekStart.getDay() + 1);
        
        const modalOverlay = document.createElement('div');
        modalOverlay.className = 'modal-overlay';
        modalOverlay.innerHTML = `
            <div class="modal-content">
                <h2 class="modal-title" id="modalTitle"></h2>
                <div class="modal-detail">
                    <span class="modal-label">Time:</span>
                    <span class="modal-value" id="modalTime"></span>
                </div>
                <div class="modal-detail">
                    <span class="modal-label">Duration:</span>
                    <span class="modal-value" id="modalDuration"></span>
                </div>
                <div class="modal-detail">
                    <span class="modal-label">More Info:</span>
                    <span class="modal-value" id="modalLocation"></span>
                </div>
                <div class="modal-detail" id="modalDescriptionContainer" style="display: none;">
                    <span class="modal-label">Description:</span>
                    <span class="modal-value" id="modalDescription"></span>
                </div>
            </div>
        `;
        document.body.appendChild(modalOverlay);
        
        modalOverlay.addEventListener('click', () => {
            modalOverlay.classList.remove('active');
        });
        
        modalOverlay.addEventListener('click', (e) => {
            if (e.target === modalOverlay) {
                modalOverlay.classList.remove('active');
            }
        });
        
        function showEventModal(event) {
            const start = event.startDate.toJSDate();
            const end = event.endDate.toJSDate();
            const duration = (end - start) / (1000 * 60);
            const hours = Math.floor(duration / 60);
            const minutes = duration % 60;
            
            document.getElementById('modalTitle').textContent = event.summary;

            document.getElementById('modalTime').textContent = 
                `${start.toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: false})} – ${end.toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: false})}`;
            document.getElementById('modalDuration').textContent = 
                `${hours > 0 ? hours + ' hour' + (hours > 1 ? 's' : '') : ''} ${minutes > 0 ? minutes + ' minutes' : ''}`.trim();
            document.getElementById('modalLocation').textContent = event.location || 'No location specified';
            
            const descContainer = document.getElementById('modalDescriptionContainer');

            if (event.description) {
                document.getElementById('modalDescription').textContent = event.description;
                descContainer.style.display = 'flex';
            } else {
                descContainer.style.display = 'none';
            }
            
            modalOverlay.classList.add('active');
        }
        
        function renderCalendar(events, weekStart) {
            const hours = Array.from({length: 10}, (_, i) => i + 8);
            const days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
            
            const weekEnd = new Date(weekStart);
            weekEnd.setDate(weekEnd.getDate() + 4);
            
            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'];
            
            document.getElementById('weekRange').textContent = 
                `${monthNames[weekStart.getMonth()]} ${weekStart.getDate()} – ${weekEnd.getDate()}, ${weekStart.getFullYear()}`;
            
            let gridHTML = '<div class="calendar-grid">';
            
            gridHTML += '<div class="time-column"><div class="day-header"></div>';
            hours.forEach(hour => {
                gridHTML += `<div class="time-slot">${hour}:00</div>`;
            });
            gridHTML += '</div>';
            
            const now = new Date();
            const isCurrentWeek = now >= weekStart && now <= weekEnd;
            
            for (let i = 0; i < 5; i++) {
                const dayDate = new Date(weekStart);
                dayDate.setDate(dayDate.getDate() + i);
                
                gridHTML += '<div class="day-column">';
                gridHTML +=
                `<div class="day-header">
                    <span class="day-number">${dayDate.getDate()}</span>
                    <span class="day-name">${days[i]}</span>
                </div>`;
                
                hours.forEach(() => {
                    gridHTML += '<div class="hour-line"></div>';
                });
                
                if (isCurrentWeek && dayDate.toDateString() === now.toDateString()) {
                    const currentHour = now.getHours() + now.getMinutes() / 60;
                    const top = ((currentHour - 8) * 50) + 50;
                    gridHTML += `<div class="current-time-indicator" style="top: ${top}px;"></div>`;
                }
                
                const dayEvents = events.filter(e => {
                    const eventDate = e.startDate.toJSDate();
                    return eventDate.toDateString() === dayDate.toDateString();
                });
                
                dayEvents.forEach((event, index) => {
                    const start = event.startDate.toJSDate();
                    const end = event.endDate.toJSDate();
                    
                    const startHour = start.getHours() + start.getMinutes() / 60;
                    const duration = (end - start) / (1000 * 60 * 60);
                    
                    const top = ((startHour - 8) * 50) + 50;
                    const height = duration * 50;
                    
                    const eventType =
                    event.summary.includes('Lesson') ? 'Lesson' : 
                    event.summary.includes('Activity') ? 'Activity' : '';
                    
                    gridHTML +=
                    `<div class="event" data-event-index="${i}-${index}" style="top: ${top}px; height: ${height}px;">
                        <div class="event-time">${start.toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: false})} – ${end.toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: false})}${eventType ? ' • ' + eventType : ''}</div>
                        <div class="event-title">${event.summary}</div>
                        ${event.location ? `<div class="event-location">${event.location}</div>` : ''}
                    </div>`;
                });
                
                gridHTML += '</div>';
            }
            
            gridHTML += '</div>';
            document.getElementById('calendarGrid').innerHTML = gridHTML;
            
            document.querySelectorAll('.event').forEach(eventEl => {
                eventEl.addEventListener('click', () => {
                    const [dayIndex, eventIndex] = eventEl.dataset.eventIndex.split('-').map(Number);
                    const dayDate = new Date(weekStart);
                    dayDate.setDate(dayDate.getDate() + dayIndex);
                    
                    const dayEvents = events.filter(e => {
                        const eventDate = e.startDate.toJSDate();
                        return eventDate.toDateString() === dayDate.toDateString();
                    });
                    
                    showEventModal(dayEvents[eventIndex]);
                });
            });
        }
        
        try {
            const jcalData = ICAL.parse(calendarData);
            const comp = new ICAL.Component(jcalData);
            const eventComponents = comp.getAllSubcomponents('vevent');
            const events = eventComponents.map(e => new ICAL.Event(e));
            
            renderCalendar(events, currentWeekStart);
            
            document.getElementById('prevWeek').addEventListener('click', () => {
                currentWeekStart.setDate(currentWeekStart.getDate() - 7);
                renderCalendar(events, currentWeekStart);
            });
            
            document.getElementById('nextWeek').addEventListener('click', () => {
                currentWeekStart.setDate(currentWeekStart.getDate() + 7);
                renderCalendar(events, currentWeekStart);
            });
            
        } catch (error) {
            document.getElementById('calendar').innerHTML = '<p style="color: #ff6b6b;">Error parsing calendar: ' + error.message + '</p>';
        }
        <?php endif; ?>
    </script>
</body>
</html>