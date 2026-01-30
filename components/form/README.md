# Reusable Form UI Components

This directory contains reusable PHP form components that follow a single-instance-per-type architecture. Each component can be reused across multiple forms by passing different props/configuration.

## 📦 Available Components

### Field Components

1. **FormInput** (`form-input.php`)
   - For: text, email, phone, number, url, tel fields
   - Required props: `id`, `name`, `label`, `type`
   - Optional props: `value`, `placeholder`, `required`, `hint`, `errorMessage`, `error`

2. **FormSelect** (`form-select.php`)
   - For: dropdown selections
   - Required props: `id`, `name`, `label`, `options`
   - Optional props: `value`, `placeholder`, `required`, `hint`, `errorMessage`, `error`
   - Options format: `[['value' => 'val', 'label' => 'Label'], ...]`

3. **FormTextarea** (`form-textarea.php`)
   - For: multi-line text input
   - Required props: `id`, `name`, `label`
   - Optional props: `value`, `placeholder`, `required`, `hint`, `errorMessage`, `error`

4. **FormRadioGroup** (`form-radio-group.php`)
   - For: radio button groups
   - Required props: `name`, `label`, `options`
   - Optional props: `required`, `errorMessage`, `error`
   - Options format: `[['value' => 'val', 'label' => 'Label'], ...]`

5. **FormFileUpload** (`form-file-upload.php`)
   - For: file uploads
   - Required props: `id`, `name`, `label`
   - Optional props: `required`, `filename`, `errorMessage`, `error`

6. **FormActions** (`form-actions.php`)
   - For: submit/cancel buttons
   - Optional props: `cancelLabel`, `submitLabel`

### Layout Components

7. **FormRow** (`form-row.php`)
   - Creates a 2-column grid on desktop, 1-column on mobile
   - Props: `slot` (content to render inside)

8. **FormSection** (`form-section.php`)
   - Groups related fields with a title and divider
   - Required props: `title`
   - Optional props: `slot` (content to render inside)

## 🎨 Styling

All components use the unified SCSS module: `src/styles/components/form_components.scss`

Generated CSS files:
- `assets/css/components-form_components.css` (development)
- `assets/css/components-form_components.min.css` (production)

Include in your page:
```html
<link rel="stylesheet" href="../assets/css/components-form_components.css" />
```

## 📝 Usage Examples

### Basic Input Field
```php
<?php 
include('components/form/form-input.php', [
    'id' => 'firstName',
    'name' => 'first_name',
    'label' => 'First Name',
    'type' => 'text',
    'placeholder' => 'Enter your first name',
    'required' => true
]);
?>
```

### Select Dropdown
```php
<?php 
include('components/form/form-select.php', [
    'id' => 'country',
    'name' => 'country',
    'label' => 'Country',
    'placeholder' => 'Select your country',
    'required' => true,
    'options' => [
        ['value' => 'us', 'label' => 'United States'],
        ['value' => 'ca', 'label' => 'Canada'],
        ['value' => 'uk', 'label' => 'United Kingdom']
    ]
]);
?>
```

### Form Row (2-column layout)
```php
<?php 
ob_start();
include('components/form/form-input.php', [
    'id' => 'firstName',
    'name' => 'first_name',
    'label' => 'First Name',
    'type' => 'text',
    'required' => true
]);
echo '<div style="margin: 0 8px;"></div>';
include('components/form/form-input.php', [
    'id' => 'lastName',
    'name' => 'last_name',
    'label' => 'Last Name',
    'type' => 'text',
    'required' => true
]);
$slot = ob_get_clean();

include('components/form/form-row.php', ['slot' => $slot]);
?>
```

### Form Section with Title
```php
<?php 
ob_start();
include('components/form/form-input.php', [
    'id' => 'email',
    'name' => 'email',
    'label' => 'Email',
    'type' => 'email',
    'required' => true
]);
$sectionSlot = ob_get_clean();

include('components/form/form-section.php', [
    'title' => 'Contact Information',
    'slot' => $sectionSlot
]);
?>
```

### Complete Form Example
```php
<form id="contactForm">
    <?php 
    // Row 1: First and Last Name
    ob_start();
    include('components/form/form-input.php', [
        'id' => 'first_name',
        'name' => 'first_name',
        'label' => 'First Name',
        'type' => 'text',
        'required' => true
    ]);
    echo '<div style="margin: 0 8px;"></div>';
    include('components/form/form-input.php', [
        'id' => 'last_name',
        'name' => 'last_name',
        'label' => 'Last Name',
        'type' => 'text',
        'required' => true
    ]);
    $row1 = ob_get_clean();
    include('components/form/form-row.php', ['slot' => $row1]);
    
    // Email field
    include('components/form/form-input.php', [
        'id' => 'email',
        'name' => 'email',
        'label' => 'Email',
        'type' => 'email',
        'required' => true
    ]);
    
    // Message textarea
    include('components/form/form-textarea.php', [
        'id' => 'message',
        'name' => 'message',
        'label' => 'Message',
        'placeholder' => 'Enter your message...',
        'required' => true
    ]);
    
    // Form actions
    include('components/form/form-actions.php', [
        'cancelLabel' => 'Cancel',
        'submitLabel' => 'Send Message'
    ]);
    ?>
</form>
```

## 🎯 FormAssembly Compatibility

All components preserve FormAssembly-compatible IDs and names. Use the same IDs/names from your existing FormAssembly forms:

```php
<?php 
include('components/form/form-input.php', [
    'id' => 'tfa_1',        // FormAssembly ID
    'name' => 'tfa_1',      // FormAssembly name
    'label' => 'First Name',
    'type' => 'text',
    'required' => true
]);
?>
```

## 🚀 Demo Page

See all components in action:
```
pages/form-components-demo.php
```

## 🔄 Building Styles

After modifying `src/styles/components/form_components.scss`, rebuild:

```bash
npm run prod
```

This will generate the CSS files in `assets/css/`.

## ✅ Design System

Components use the existing design system:
- **Colors**: CSS custom properties from `--color-*`
- **Fonts**: Poppins font family with existing weights
- **Spacing**: 16px base system (8px, 16px, 24px, 32px)
- **Borders**: Gradient borders via `@include input-border`
- **Focus states**: Custom focus styles (not browser default)

## 📱 Responsive Behavior

- **FormRow**: 2 columns on desktop (>767px), 1 column on mobile
- **FormActions**: Horizontal on desktop, vertical (reversed) on mobile
- All inputs: Full width with proper padding and touch targets

## 🔒 Error States

Add error styling by setting `error => true` and providing `errorMessage`:

```php
<?php 
include('components/form/form-input.php', [
    'id' => 'email',
    'name' => 'email',
    'label' => 'Email',
    'type' => 'email',
    'required' => true,
    'error' => true,
    'errorMessage' => 'Please enter a valid email address'
]);
?>
```

## 🎨 Custom Styling

Each component has semantic class names for custom styling:
- `.form-field` - Field container
- `.form-label` - Label text
- `.form-input` - Input field container
- `.form-select` - Select container
- `.form-textarea` - Textarea container
- `.form-radio-group` - Radio group container
- `.form-file` - File upload container
- `.form-actions` - Action buttons container
- `.form-row` - Grid layout row
- `.form-section` - Section container
- `.is-error` - Error state modifier

## 📋 Future Use Cases

These components are designed to be reused for:
- ✅ Careers application forms
- ✅ Contact Us forms
- ✅ Marketing landing page forms
- ✅ CMS-driven dynamic forms
- ✅ Multi-step wizards
- ✅ User profile forms
