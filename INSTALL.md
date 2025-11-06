# Installation Guide

## For Users

### Option 1: Install from GitHub Release (Recommended)

1. Go to the [Releases page](https://github.com/pjaudiomv/mayo-calendar-addon/releases)
2. Download the latest `mayo-calendar-addon.zip` file
3. In WordPress admin, go to **Plugins > Add New > Upload Plugin**
4. Choose the downloaded zip file and click **Install Now**
5. Click **Activate Plugin**

### Option 2: Manual Installation

1. Download or clone this repository
2. If you downloaded the source, you need to build it first:
   ```bash
   npm install
   npm run build
   ```
3. Upload the entire `mayo-calendar-addon` folder to `/wp-content/plugins/`
4. In WordPress admin, go to **Plugins** and activate **Mayo Calendar Addon**

## Prerequisites

- **Mayo Events Manager** must be installed and activated first
- WordPress 5.8 or higher
- PHP 7.4 or higher

## Verify Installation

After activation, you should be able to use the `[mayo_event_calendar]` shortcode on any page or post.

## For Developers

### Development Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/bmlt-enabled/mayo-calendar-addon.git
   cd mayo-calendar-addon
   ```

2. Install dependencies:
   ```bash
   npm install
   ```

3. Build for development (with watch mode):
   ```bash
   npm run dev
   ```

4. Build for production:
   ```bash
   npm run build
   ```

### Development Workflow

1. Make changes to files in `assets/js/src/`
2. Run `npm run dev` to automatically rebuild on file changes
3. Test in your WordPress installation
4. Run `npm run build` before committing for production

### Creating a Release

1. Update version in `mayo-calendar-addon.php` and `package.json`
2. Run `npm run build`
3. Commit changes
4. Create a git tag: `git tag v1.0.0`
5. Push tag: `git push origin v1.0.0`
6. Create release on GitHub with the tag

## Troubleshooting

### "Mayo Calendar Addon requires Mayo Events Manager"

Make sure Mayo Events Manager is installed and activated before activating this addon.

### Calendar not appearing

1. Check that you're using the correct shortcode: `[mayo_event_calendar]`
2. Verify the page/post is published
3. Check browser console for JavaScript errors
4. Clear browser cache and WordPress cache

### Events not loading

1. Verify Mayo Events Manager has events published
2. Check that events have valid dates
3. Inspect Network tab in browser dev tools for API errors
4. Check WordPress debug log for PHP errors
