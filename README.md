# Mayo Calendar Addon

A WordPress plugin that adds FullCalendar view support to Mayo Events Manager.

## Description

This companion plugin extends Mayo Events Manager by adding a calendar view powered by FullCalendar. Display your events in an interactive month, week, or list calendar format.

## Requirements

- WordPress 5.8 or higher
- PHP 7.4 or higher
- **Mayo Events Manager plugin** (must be installed and activated)

## Installation

1. Go to the [Releases page](https://github.com/pjaudiomv/mayo-calendar-addon/releases)
2. Download the latest `mayo-calendar-addon.zip` file
3. In WordPress admin, go to **Plugins > Add New > Upload Plugin**
4. Choose the downloaded zip file and click **Install Now**
5. Click **Activate Plugin**

**Important:** Make sure Mayo Events Manager is already installed and activated before activating this addon.

## Usage

Add the calendar to any page or post using the `[mayo_event_calendar]` shortcode:

```
[mayo_event_calendar]
```

### Shortcode Parameters

#### View Options
- `initial_view` - The initial calendar view (default: `dayGridMonth`)
    - `dayGridMonth` - Month view
    - `timeGridWeek` - Week view with times
    - `listWeek` - List view

- `height` - Calendar height (default: `auto`)
    - `auto` - Automatically adjust height
    - `600` - Fixed pixel height

- `timezone` - Calendar timezone (default: `local`)

#### Filter Options
- `categories` - Filter by category slugs (comma-separated)
- `tags` - Filter by tag slugs (comma-separated)
- `event_type` - Filter by event type (`Service` or `Activity`)
- `status` - Filter by event status (default: `publish`)
- `service_body` - Filter by service body IDs (comma-separated)
- `source_ids` - Filter by source IDs (comma-separated)

### Examples

#### Basic Month Calendar
```
[mayo_event_calendar]
```

#### Week View Calendar
```
[mayo_event_calendar initial_view="timeGridWeek"]
```

#### Filtered Calendar (Service Events Only)
```
[mayo_event_calendar event_type="Service"]
```

#### Calendar with Multiple Filters
```
[mayo_event_calendar
  initial_view="dayGridMonth"
  categories="meetings,events"
  event_type="Service"]
```

## Features

- **Multiple Views**: Switch between month, week, and list views
- **Event Filtering**: Filter by categories, tags, event type, and more
- **Click to View**: Click any event to view its full details
- **Color Coding**: Events are color-coded by type (Service vs Activity)
- **Responsive**: Mobile-friendly design
- **Dynamic Loading**: Events load automatically as you navigate the calendar

## Development

### Build Commands

- `npm run build` - Build for production
- `npm run dev` - Build for development with watch mode

### File Structure

```
mayo-calendar-addon/
├── mayo-calendar-addon.php    # Main plugin file
├── assets/
│   ├── js/
│   │   ├── src/
│   │   │   ├── calendar.js         # Entry point
│   │   │   └── EventCalendar.js    # Calendar component
│   │   └── dist/
│   │       └── calendar.bundle.js  # Compiled JS
│   └── css/
│       └── calendar.css            # Calendar styles
├── package.json
├── vite.config.js
└── README.md
```

## License

GPL v2 or later

## Credits

Built with [FullCalendar](https://fullcalendar.io/) v6
