<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Components Demo</title>
    <?php include('../components/head/_head.php') ?>
    <link rel="stylesheet" href="../assets/css/components-form_components.css" />
    <style>
        .demo-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 20px;
            background: var(--color-black);
            min-height: 100vh;
        }
        .demo-title {
            font-family: var(--semibold-font);
            font-size: 40px;
            color: var(--color-white);
            margin-bottom: 40px;
            text-align: center;
        }
        .component-demo {
            background: rgba(4, 4, 4, 0.5);
            border: 1px solid var(--color-grey-800);
            border-radius: 8px;
            padding: 32px;
            margin-bottom: 32px;
        }
        .component-demo h3 {
            font-family: var(--medium-font);
            font-size: 24px;
            color: var(--color-primary-green);
            margin-bottom: 24px;
        }
    </style>
</head>
<body style="background: var(--color-black);">
    <div class="demo-container">
        <h1 class="demo-title">Reusable Form Components Demo</h1>

        <!-- FormInput Demo -->
        <div class="component-demo">
            <h3>FormInput Component</h3>
            <?php 
                include('../components/form/form-input.php'); 
                // Using @ to suppress warnings about already defined variables
                @include('../components/form/form-input.php', [
                    'id' => 'firstName',
                    'name' => 'first_name',
                    'label' => 'First Name',
                    'type' => 'text',
                    'placeholder' => 'Enter your first name',
                    'required' => true,
                    'hint' => 'This is a helpful hint for the user'
                ]);
            ?>
            
            <div style="margin-top: 24px;">
                <?php 
                    @include('../components/form/form-input.php', [
                        'id' => 'email',
                        'name' => 'email',
                        'label' => 'Email Address',
                        'type' => 'email',
                        'placeholder' => 'you@example.com',
                        'required' => true
                    ]);
                ?>
            </div>

            <div style="margin-top: 24px;">
                <?php 
                    @include('../components/form/form-input.php', [
                        'id' => 'phone',
                        'name' => 'phone',
                        'label' => 'Phone Number',
                        'type' => 'tel',
                        'placeholder' => '+1 (555) 123-4567',
                        'error' => true,
                        'errorMessage' => 'Please enter a valid phone number'
                    ]);
                ?>
            </div>
        </div>

        <!-- FormSelect Demo -->
        <div class="component-demo">
            <h3>FormSelect Component</h3>
            <?php 
                @include('../components/form/form-select.php', [
                    'id' => 'country',
                    'name' => 'country',
                    'label' => 'Country',
                    'placeholder' => 'Select your country',
                    'required' => true,
                    'options' => [
                        ['value' => 'us', 'label' => 'United States'],
                        ['value' => 'ca', 'label' => 'Canada'],
                        ['value' => 'uk', 'label' => 'United Kingdom'],
                        ['value' => 'au', 'label' => 'Australia']
                    ],
                    'hint' => 'Select the country where you reside'
                ]);
            ?>
        </div>

        <!-- FormTextarea Demo -->
        <div class="component-demo">
            <h3>FormTextarea Component</h3>
            <?php 
                @include('../components/form/form-textarea.php', [
                    'id' => 'message',
                    'name' => 'message',
                    'label' => 'Your Message',
                    'placeholder' => 'Tell us about your project...',
                    'required' => true,
                    'hint' => 'Please provide as much detail as possible'
                ]);
            ?>
        </div>

        <!-- FormRadioGroup Demo -->
        <div class="component-demo">
            <h3>FormRadioGroup Component</h3>
            <?php 
                @include('../components/form/form-radio-group.php', [
                    'name' => 'preference',
                    'label' => 'Contact Preference',
                    'required' => true,
                    'options' => [
                        ['value' => 'email', 'label' => 'Email'],
                        ['value' => 'phone', 'label' => 'Phone'],
                        ['value' => 'either', 'label' => 'Either is fine']
                    ]
                ]);
            ?>
        </div>

        <!-- FormFileUpload Demo -->
        <div class="component-demo">
            <h3>FormFileUpload Component</h3>
            <?php 
                @include('../components/form/form-file-upload.php', [
                    'id' => 'resume',
                    'name' => 'resume',
                    'label' => 'Upload Resume',
                    'required' => true
                ]);
            ?>
        </div>

        <!-- FormRow Demo -->
        <div class="component-demo">
            <h3>FormRow Component (2 columns on desktop)</h3>
            <?php 
                ob_start();
                @include('../components/form/form-input.php', [
                    'id' => 'city',
                    'name' => 'city',
                    'label' => 'City',
                    'type' => 'text',
                    'placeholder' => 'Enter your city'
                ]);
                echo '<div style="margin: 0 8px;"></div>';
                @include('../components/form/form-input.php', [
                    'id' => 'zipcode',
                    'name' => 'zipcode',
                    'label' => 'Zip Code',
                    'type' => 'text',
                    'placeholder' => 'Enter zip code'
                ]);
                $slot = ob_get_clean();
                
                @include('../components/form/form-row.php', ['slot' => $slot]);
            ?>
        </div>

        <!-- FormSection Demo -->
        <div class="component-demo">
            <h3>FormSection Component</h3>
            <?php 
                ob_start();
                @include('../components/form/form-input.php', [
                    'id' => 'companyName',
                    'name' => 'company_name',
                    'label' => 'Company Name',
                    'type' => 'text',
                    'placeholder' => 'Enter your company name'
                ]);
                echo '<div style="margin: 16px 0;"></div>';
                @include('../components/form/form-input.php', [
                    'id' => 'jobTitle',
                    'name' => 'job_title',
                    'label' => 'Job Title',
                    'type' => 'text',
                    'placeholder' => 'Enter your job title'
                ]);
                $sectionSlot = ob_get_clean();
                
                @include('../components/form/form-section.php', [
                    'title' => 'Professional Information',
                    'slot' => $sectionSlot
                ]);
            ?>
        </div>

        <!-- FormActions Demo -->
        <div class="component-demo">
            <h3>FormActions Component</h3>
            <?php 
                @include('../components/form/form-actions.php', [
                    'cancelLabel' => 'Cancel',
                    'submitLabel' => 'Submit Application'
                ]);
            ?>
        </div>

        <!-- Complete Form Example -->
        <div class="component-demo">
            <h3>Complete Form Example</h3>
            <form id="demoForm">
                <?php 
                    // Section 1
                    ob_start();
                    
                    // Row 1
                    ob_start();
                    @include('../components/form/form-input.php', [
                        'id' => 'demo_first_name',
                        'name' => 'demo_first_name',
                        'label' => 'First Name',
                        'type' => 'text',
                        'placeholder' => 'John',
                        'required' => true
                    ]);
                    echo '<div style="margin: 0 8px;"></div>';
                    @include('../components/form/form-input.php', [
                        'id' => 'demo_last_name',
                        'name' => 'demo_last_name',
                        'label' => 'Last Name',
                        'type' => 'text',
                        'placeholder' => 'Doe',
                        'required' => true
                    ]);
                    $row1 = ob_get_clean();
                    @include('../components/form/form-row.php', ['slot' => $row1]);
                    
                    echo '<div style="margin: 16px 0;"></div>';
                    
                    @include('../components/form/form-input.php', [
                        'id' => 'demo_email',
                        'name' => 'demo_email',
                        'label' => 'Email',
                        'type' => 'email',
                        'placeholder' => 'john.doe@example.com',
                        'required' => true
                    ]);
                    
                    echo '<div style="margin: 16px 0;"></div>';
                    
                    @include('../components/form/form-select.php', [
                        'id' => 'demo_interest',
                        'name' => 'demo_interest',
                        'label' => 'Area of Interest',
                        'placeholder' => 'Select an option',
                        'required' => true,
                        'options' => [
                            ['value' => 'environmental', 'label' => 'Environmental Science'],
                            ['value' => 'engineering', 'label' => 'Engineering'],
                            ['value' => 'management', 'label' => 'Project Management']
                        ]
                    ]);
                    
                    $section1Slot = ob_get_clean();
                    @include('../components/form/form-section.php', [
                        'title' => 'Personal Information',
                        'slot' => $section1Slot
                    ]);
                    
                    echo '<div style="margin: 32px 0;"></div>';
                    
                    // Section 2
                    ob_start();
                    @include('../components/form/form-textarea.php', [
                        'id' => 'demo_comments',
                        'name' => 'demo_comments',
                        'label' => 'Additional Comments',
                        'placeholder' => 'Share your thoughts...',
                        'required' => false
                    ]);
                    $section2Slot = ob_get_clean();
                    @include('../components/form/form-section.php', [
                        'title' => 'Additional Details',
                        'slot' => $section2Slot
                    ]);
                    
                    echo '<div style="margin: 32px 0;"></div>';
                    
                    @include('../components/form/form-actions.php', [
                        'cancelLabel' => 'Clear Form',
                        'submitLabel' => 'Submit'
                    ]);
                ?>
            </form>
        </div>
    </div>

    <script>
        // Simple demo functionality for file upload
        document.addEventListener('DOMContentLoaded', function() {
            // File upload buttons
            document.querySelectorAll('.file-upload-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const fileInput = this.previousElementSibling;
                    fileInput.click();
                });
            });

            // File input change handlers
            document.querySelectorAll('input[type="file"]').forEach(function(input) {
                input.addEventListener('change', function() {
                    const fileName = this.files.length > 0 ? this.files[0].name : 'No file chosen';
                    const fileNameSpan = this.parentElement.querySelector('.file-name');
                    if (fileNameSpan) {
                        fileNameSpan.textContent = fileName;
                    }
                });
            });

            // Demo form submission
            const demoForm = document.getElementById('demoForm');
            if (demoForm) {
                demoForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert('Form submitted! (This is just a demo)');
                });
            }
        });
    </script>

    <?php include('../components/footer/_footer.php') ?>
</body>
</html>
