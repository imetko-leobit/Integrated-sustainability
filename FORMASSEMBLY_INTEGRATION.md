# FormAssembly Integration Guide

This document explains how the FormAssembly form is integrated into the Career Vacancy page and how to configure it.

## Overview

The Career Vacancy page (`pages/career-vacancy.php`) now uses a FormAssembly embedded form instead of a custom HTML form. This integration follows FormAssembly's recommended best practices using the iframe embed method.

## Integration Details

### Files Modified

1. **`components/elements/career-form.php`**: Replaced the custom HTML form with FormAssembly iframe embed code
2. **`pages/career-vacancy.php`**: Updated to use FormAssembly configuration variables
3. **`src/styles/components/career_form.scss`**: Added FormAssembly-specific styles for the iframe container

### How It Works

The integration uses FormAssembly's recommended iframe method with the following features:

- **External Script Loader**: Automatically loads the FormAssembly resize helper script
- **Responsive iframe**: The form adjusts its height dynamically to fit content
- **Single Load Protection**: Script only loads once per page to prevent conflicts
- **Mobile-Responsive**: Different minimum heights for various screen sizes

## Configuration

To configure the FormAssembly form URL, edit `/pages/career-vacancy.php`:

```php
// FormAssembly configuration
$formassembly_form_url = "https://YOUR_DOMAIN.tfaforms.net/YOUR_FORM_ID";
$formassembly_form_height = "800";  // Initial iframe height in pixels
$formassembly_form_width = "100%";  // Iframe width (pixels or percentage)
```

### Getting Your FormAssembly URL

1. Log in to your FormAssembly account
2. Navigate to the form you want to embed
3. Click on "Publish"
4. Select "Embed in iframe"
5. Copy the URL from the iframe `src` attribute (e.g., `https://example.tfaforms.net/12345`)
6. Paste it into the `$formassembly_form_url` variable in `career-vacancy.php`

## Layout and Styling

The form maintains the existing two-column layout:

- **Left Column**: Contains the "technical issues?" card (vacancy-card component)
- **Right Column**: Contains the embedded FormAssembly form

The FormAssembly iframe styling:

- Removes default form background and padding for clean integration
- Sets responsive minimum heights (800px desktop, 600px tablet, 500px mobile)
- Maintains full width within the grid column
- Border is removed for seamless appearance

## Technical Implementation

### iframe Embed Method

The integration uses FormAssembly's iframe method which provides:

1. **Isolation**: Form runs in its own context, preventing CSS/JS conflicts
2. **Auto-updates**: Form changes in FormAssembly reflect immediately
3. **Dynamic Sizing**: Resize helper script adjusts iframe height automatically
4. **Cross-browser Compatibility**: Works consistently across all browsers

### Resize Helper Script

The FormAssembly resize helper script (`iframe_resize_helper.js`) is loaded conditionally:

```javascript
if (!window.formAssemblyResizeHelperLoaded) {
    window.formAssemblyResizeHelperLoaded = true;
    // Load script...
}
```

This ensures the script loads only once even if multiple forms are on the page.

## Rebuilding CSS

After making changes to the SCSS file, rebuild the CSS:

```bash
npm run prod
```

This compiles the SCSS and generates the production-ready CSS files.

## Troubleshooting

### Form Not Displaying

- Verify the `$formassembly_form_url` is correct
- Check browser console for errors
- Ensure the FormAssembly form is published and active

### Height Issues

- Adjust `$formassembly_form_height` for the initial load
- The resize helper will adjust height once the form loads
- Check that the resize helper script is loading (view browser Network tab)

### Styling Conflicts

- The iframe isolates the form from page styles
- Customize the wrapper styles in `career_form.scss` under `.career-form--formassembly`
- Avoid modifying the iframe content directly

## Browser Testing

Test the form in:

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Support

For FormAssembly-specific questions:
- [FormAssembly Help Center](https://help.formassembly.com/)
- [FormAssembly iframe Documentation](https://help.formassembly.com/help/340359-publish-with-an-iframe)

For integration issues with this website:
- Contact the technical team
- Review the code in `components/elements/career-form.php`
