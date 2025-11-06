# Mayo Calendar Addon

A WordPress plugin that adds FullCalendar view support to Mayo Events Manager.

## Description

This companion plugin extends Mayo Events Manager by adding a calendar view powered by FullCalendar.

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
