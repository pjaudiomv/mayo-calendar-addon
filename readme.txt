=== Mayo Calendar Addon ===

Contributors: pjaudiomv, bmltenabled
Plugin URI: https://github.com/bmlt-enabled/mayo-calendar-addon
Tags: calendar, events, fullcalendar, bmlt, recovery
Requires at least: 5.8
Requires PHP: 7.4
Tested up to: 6.7
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds interactive FullCalendar view to Mayo Events Manager for displaying recovery events in month, week, and list formats.

== Description ==

Mayo Calendar Addon is a companion plugin that extends Mayo Events Manager by adding a beautiful, interactive calendar view powered by FullCalendar. Display your recovery events in familiar month, week, and list calendar formats with just a simple shortcode.

**Important: This plugin requires Mayo Events Manager to be installed and activated.**

**Key Features:**

* **Multiple Views**: Switch seamlessly between month, week, and list calendar views
* **Event Filtering**: Filter events by categories, tags, event type (Service/Activity), service body, and more
* **Click to View**: Click any event to navigate to its full details page
* **Color Coding**: Events are automatically color-coded by type for easy identification
* **Responsive Design**: Works perfectly on desktop, tablet, and mobile devices
* **Dynamic Loading**: Events load automatically as you navigate through dates
* **Zero Configuration**: Works out of the box with your existing Mayo Events Manager setup

**Perfect for:**

* Service bodies wanting to display events in a traditional calendar format
* Websites that need both list and calendar views of their events
* Organizations looking for an intuitive way to browse upcoming recovery events
* Anyone who prefers calendar navigation over list-based event displays

== Installation ==

**Prerequisites:**
* Mayo Events Manager plugin must be installed and activated

**Installation Steps:**

1. Upload the `mayo-calendar-addon` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the `[mayo_event_calendar]` shortcode to any page or post
4. That's it! Your calendar will display using your existing Mayo Events Manager data

**From GitHub (for developers):**

1. Clone the repository: `git clone https://github.com/bmlt-enabled/mayo-calendar-addon.git`
2. Navigate to the plugin directory: `cd mayo-calendar-addon`
3. Install dependencies: `npm install`
4. Build the assets: `npm run build`
5. Upload to your WordPress plugins directory and activate

== Frequently Asked Questions ==

= Does this plugin work without Mayo Events Manager? =

No. This is a companion plugin that extends Mayo Events Manager. You must have Mayo Events Manager installed and activated first.

= Can I customize which events appear on the calendar? =

Yes! The shortcode supports filtering by categories, tags, event type, service body, and source IDs. See the shortcode usage section for details.

= Can I change the default calendar view? =

Yes, use the `initial_view` attribute in your shortcode to set the default view to month, week, or list.

= Does this work with recurring events? =

Yes! All recurring events created in Mayo Events Manager will automatically appear on the calendar on their scheduled dates.

= Can I have multiple calendars on different pages? =

Absolutely! You can use the shortcode on multiple pages with different filter settings for each calendar.

= Is there a limit to how many events can be displayed? =

The calendar fetches events dynamically based on the date range being viewed, so there's no practical limit.

== Screenshots ==

1. Month calendar view showing events
2. Week calendar view with time slots
3. List view showing event details
4. Calendar filtering options

== Shortcode Usage ==

**Basic Usage:**
`[mayo_event_calendar]`

**View Options:**

Change the initial calendar view:
`[mayo_event_calendar initial_view="timeGridWeek"]`

Available views:
* `dayGridMonth` - Month view (default)
* `timeGridWeek` - Week view with time slots
* `listWeek` - List view

**Filtering Events:**

Show only Service events:
`[mayo_event_calendar event_type="Service"]`

Filter by category:
`[mayo_event_calendar categories="workshops,conventions"]`

Filter by tags:
`[mayo_event_calendar tags="speaker-meeting,online"]`

Filter by service body:
`[mayo_event_calendar service_body="123,456"]`

**Calendar Customization:**

Set calendar height:
`[mayo_event_calendar height="700"]`

Set timezone:
`[mayo_event_calendar timezone="America/New_York"]`

**Combined Examples:**

Week view filtered by event type:
`[mayo_event_calendar initial_view="timeGridWeek" event_type="Activity"]`

Month view with multiple filters:
`[mayo_event_calendar categories="conventions" event_type="Service" height="800"]`

== Shortcode Attributes ==

**View Options:**
* `initial_view` - Initial calendar view (default: `dayGridMonth`)
* `height` - Calendar height in pixels or `auto` (default: `auto`)
* `timezone` - Calendar timezone (default: `local`)

**Filter Options:**
* `categories` - Filter by category slugs (comma-separated)
* `tags` - Filter by tag slugs (comma-separated)
* `event_type` - Filter by event type: `Service` or `Activity`
* `status` - Filter by event status (default: `publish`)
* `service_body` - Filter by service body IDs (comma-separated)
* `source_ids` - Filter by source IDs (comma-separated)

== External Services ==

This plugin uses FullCalendar, an open-source JavaScript event calendar library:

**FullCalendar**
- **Purpose**: Provides the calendar rendering and interaction functionality
- **Data sent**: No user data is transmitted to external services
- **License**: MIT License
- **Privacy**: The FullCalendar library is bundled with the plugin; no external requests are made
- **More info**: https://fullcalendar.io/

All event data is fetched from your local Mayo Events Manager installation via WordPress REST API. No event data is sent to any external services.

== Changelog ==

= 1.0.0 =
* Initial release
* Month, week, and list calendar views
* Event filtering by categories, tags, type, and service body
* Color-coded events by type
* Click-through to event details
* Responsive design
* Dynamic event loading
* Built with FullCalendar v6
* Vite build system for fast compilation

== Upgrade Notice ==

= 1.0.0 =
Initial release of Mayo Calendar Addon. Requires Mayo Events Manager plugin.

== Development ==

**For Developers:**

This plugin is built with modern JavaScript using React and Vite.

**Build Commands:**
* `npm run build` - Build for production
* `npm run dev` - Build for development with watch mode

**Repository:**
https://github.com/bmlt-enabled/mayo-calendar-addon

**Contributing:**
Contributions are welcome! Please submit issues and pull requests on GitHub.

**Technical Stack:**
* React 18
* FullCalendar v6
* WordPress @wordpress/element
* Vite build system

== Credits ==

Built with ❤️ by BMLT Enabled
