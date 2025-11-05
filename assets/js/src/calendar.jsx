import { render } from '@wordpress/element';
import EventCalendar from './EventCalendar.jsx';

document.addEventListener('DOMContentLoaded', () => {
    const calendarContainers = document.querySelectorAll('.mayo-calendar-addon');
    
    calendarContainers.forEach(container => {
        if (!container) return;
        const instance = container.dataset.instance;
        const settings = window[`mayoCalendarSettings_${instance}`] || {};
        render(<EventCalendar settings={settings} />, container);
    });
});
