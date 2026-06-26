<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Form Field Labels (used by quote & contact forms)
    |--------------------------------------------------------------------------
    */
    'name' => 'Full Name',
    'email' => 'Email Address',
    'phone' => 'Phone Number',
    'location' => 'Project Location',
    'project_type' => 'Project Type',
    'area' => 'Area Size',
    'budget_range' => 'Budget Range',
    'timeline' => 'Timeline',
    'description' => 'Project Description',
    'attachments' => 'Attachments',
    'select_option' => 'Select option',
    'upload_files' => 'Click to upload files',
    'file_types' => 'Formats: JPG, PNG, PDF (Max 10MB)',

    /*
    |--------------------------------------------------------------------------
    | Form Labels
    |--------------------------------------------------------------------------
    */
    'labels' => [
        'name' => 'Full Name',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'email' => 'Email Address',
        'phone' => 'Phone Number',
        'mobile' => 'Mobile Number',
        'whatsapp' => 'WhatsApp Number',
        'subject' => 'Subject',
        'message' => 'Message',
        'inquiry_type' => 'Inquiry Type',
        
        'project_type' => 'Project Type',
        'project_name' => 'Project Name',
        'project_description' => 'Project Description',
        'project_location' => 'Project Location',
        'project_area' => 'Area Size (m²)',
        'project_budget' => 'Estimated Budget',
        'project_timeline' => 'Target Timeline',
        'project_style' => 'Desired Design Style',
        
        'address' => 'Address',
        'city' => 'City',
        'province' => 'Province',
        'postal_code' => 'Postal Code',
        'country' => 'Country',
        
        'company_name' => 'Company Name',
        'company_address' => 'Company Address',
        'job_title' => 'Job Title',
        
        'preferred_contact' => 'Preferred Contact Method',
        'best_time_to_call' => 'Best Time to Call',
        
        'service_type' => 'Service Type',
        'consultation_date' => 'Consultation Date',
        'consultation_time' => 'Consultation Time',
        
        'attachment' => 'Attachment',
        'file_upload' => 'Upload File',
        'reference_images' => 'Reference Images',
        'floor_plan' => 'Floor Plan',
        
        'password' => 'Password',
        'password_confirmation' => 'Confirm Password',
        'current_password' => 'Current Password',
        'new_password' => 'New Password',
        
        'newsletter' => 'Subscribe to Newsletter',
        'terms' => 'I agree to the terms and conditions',
        'privacy' => 'I agree to the privacy policy',
        
        'captcha' => 'Security Verification',
        'submit_button' => 'Submit',
        'reset_button' => 'Reset',
        'cancel_button' => 'Cancel',
        'save_button' => 'Save',
    ],

    /*
    |--------------------------------------------------------------------------
    | Form Placeholders
    |--------------------------------------------------------------------------
    */
    'placeholders' => [
        'name' => 'Enter your full name',
        'full_name' => 'Enter your full name',
        'first_name' => 'Enter first name',
        'last_name' => 'Enter last name',
        'email' => 'example@email.com',
        'phone' => '+62 8xx xxxx xxxx',
        'phone_optional' => '+62 8xx xxxx xxxx (optional)',
        'subject' => 'Subject of your message',
        'message' => 'Write your message or question here...',
        
        'project_name' => 'Example: Jati House Renovation',
        'project_description' => 'Tell us about your project, special needs, and design preferences...',
        'project_location' => 'Complete project address',
        'project_area' => 'Example: 150',
        'location' => 'Project address or location',
        'area' => 'Area in m²',
        'tell_us' => 'Tell us about your project needs or questions...',
        
        'address' => 'Complete address',
        'city' => 'City name',
        'postal_code' => 'Postal code',
        
        'company_name' => 'Your company name',
        'job_title' => 'Your job title',
        
        'search' => 'Search...',
        'select_option' => 'Select option',
        'select_date' => 'Select date',
        'select_time' => 'Select time',
        
        'attachment' => 'Click or drag files here',
        'file_types' => 'Accepted formats: JPG, PNG, PDF (Max 10MB)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Dropdown Options
    |--------------------------------------------------------------------------
    */
    'options' => [
        'project_types' => [
            'residential' => 'Residential House',
            'apartment' => 'Apartment',
            'office' => 'Office',
            'restaurant' => 'Restaurant / Cafe',
            'hotel' => 'Hotel / Villa',
            'retail' => 'Shop / Retail',
            'showroom' => 'Showroom',
            'other' => 'Other',
        ],
        
        'inquiry_types' => [
            'general' => 'General Inquiry',
            'quote' => 'Request Quote',
            'consultation' => 'Schedule Consultation',
            'collaboration' => 'Collaboration',
            'career' => 'Career',
            'feedback' => 'Feedback',
            'other' => 'Other',
        ],
        
        'service_types' => [
            'full_design' => 'Full Design',
            'consultation_only' => 'Consultation Only',
            'renovation' => 'Renovation',
            'makeover' => 'Makeover',
            'custom' => 'Custom',
        ],
        
        'budget_ranges' => [
            'under_50m' => 'Under IDR 50 million',
            '50m_100m' => 'IDR 50 million - IDR 100 million',
            '100m_250m' => 'IDR 100 million - IDR 250 million',
            '250m_500m' => 'IDR 250 million - IDR 500 million',
            '500m_1b' => 'IDR 500 million - IDR 1 billion',
            'above_1b' => 'Above IDR 1 billion',
            'discuss' => 'To be discussed',
        ],
        
        'timeline_options' => [
            'urgent' => 'ASAP (1-2 weeks)',
            'short' => 'Soon (1 month)',
            'medium' => '1-3 months',
            'flexible' => 'Flexible',
            'discuss' => 'To be discussed',
        ],
        
        'design_styles' => [
            'modern' => 'Modern',
            'minimalist' => 'Minimalist',
            'classic' => 'Classic',
            'scandinavian' => 'Scandinavian',
            'industrial' => 'Industrial',
            'contemporary' => 'Contemporary',
            'traditional' => 'Traditional',
            'bohemian' => 'Bohemian',
            'luxury' => 'Luxury',
            'mixed' => 'Mixed',
            'not_sure' => 'Not sure yet',
        ],
        
        'contact_methods' => [
            'email' => 'Email',
            'phone' => 'Phone',
            'whatsapp' => 'WhatsApp',
        ],
        
        'best_times' => [
            'morning' => 'Morning (08:00 - 12:00)',
            'afternoon' => 'Afternoon (12:00 - 15:00)',
            'evening' => 'Evening (15:00 - 18:00)',
            'anytime' => 'Anytime',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Validation Messages
    |--------------------------------------------------------------------------
    */
    'validation' => [
        'required' => 'The :attribute field is required',
        'email' => 'The :attribute format is invalid',
        'phone' => 'The :attribute format is invalid',
        'min' => 'The :attribute must be at least :min characters',
        'max' => 'The :attribute may not be greater than :max characters',
        'numeric' => 'The :attribute must be a number',
        'integer' => 'The :attribute must be an integer',
        'date' => 'The :attribute must be a valid date',
        'url' => 'The :attribute must be a valid URL',
        'file' => 'The :attribute must be a file',
        'mimes' => 'The :attribute must be a file of type: :values',
        'size' => 'The :attribute may not be greater than :size KB',
        'confirmed' => 'The :attribute confirmation does not match',
        'unique' => 'The :attribute has already been taken',
        'accepted' => 'You must accept the :attribute',
        
        'custom' => [
            'name' => [
                'required' => 'Full name is required',
                'min' => 'Name must be at least 3 characters',
                'max' => 'Name may not be greater than 100 characters',
            ],
            'email' => [
                'required' => 'Email address is required',
                'email' => 'Please enter a valid email address',
                'unique' => 'This email is already registered',
            ],
            'phone' => [
                'required' => 'Phone number is required',
                'regex' => 'Please enter a valid phone number',
            ],
            'message' => [
                'required' => 'Message is required',
                'min' => 'Message must be at least 10 characters',
                'max' => 'Message may not be greater than 1000 characters',
            ],
            'project_type' => [
                'required' => 'Please select a project type',
            ],
            'project_description' => [
                'required' => 'Project description is required',
                'min' => 'Description must be at least 20 characters',
            ],
            'terms' => [
                'accepted' => 'You must accept the terms and conditions',
            ],
            'privacy' => [
                'accepted' => 'You must accept the privacy policy',
            ],
            'captcha' => [
                'required' => 'Security verification is required',
                'captcha' => 'Security verification is invalid',
            ],
        ],
        
        'attributes' => [
            'name' => 'Full Name',
            'email' => 'Email',
            'phone' => 'Phone Number',
            'message' => 'Message',
            'subject' => 'Subject',
            'project_type' => 'Project Type',
            'project_description' => 'Project Description',
            'project_location' => 'Project Location',
            'project_area' => 'Area Size',
            'project_budget' => 'Estimated Budget',
            'service_type' => 'Service Type',
            'consultation_date' => 'Consultation Date',
            'address' => 'Address',
            'city' => 'City',
            'postal_code' => 'Postal Code',
            'password' => 'Password',
            'password_confirmation' => 'Password Confirmation',
            'attachment' => 'Attachment',
            'terms' => 'Terms and Conditions',
            'privacy' => 'Privacy Policy',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Success Messages
    |--------------------------------------------------------------------------
    */
    'success' => [
        'contact_sent' => 'Your message has been sent successfully! Our team will contact you soon.',
        'quote_requested' => 'Quote request sent successfully! We will process it within 1-2 business days.',
        'consultation_booked' => 'Consultation scheduled successfully! A confirmation has been sent to your email.',
        'subscribed' => 'You have successfully subscribed to our newsletter!',
        'profile_updated' => 'Profile updated successfully!',
        'password_changed' => 'Password changed successfully!',
        'file_uploaded' => 'File uploaded successfully!',
        'inquiry_sent' => 'Your inquiry has been sent successfully!',
    ],

    /*
    |--------------------------------------------------------------------------
    | Error Messages
    |--------------------------------------------------------------------------
    */
    'error' => [
        'general' => 'An error occurred. Please try again.',
        'send_failed' => 'Failed to send message. Please try again later.',
        'file_upload_failed' => 'Failed to upload file. Please ensure the format and size are correct.',
        'invalid_file_type' => 'File type is not supported.',
        'file_too_large' => 'File size is too large. Maximum 10MB.',
        'already_subscribed' => 'This email is already subscribed to the newsletter.',
        'booking_conflict' => 'The selected schedule is not available. Please choose another time.',
        'captcha_failed' => 'Security verification failed. Please try again.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Helper Text
    |--------------------------------------------------------------------------
    */
    'helper' => [
        'phone_format' => 'Format: +62 or 08xx',
        'email_privacy' => 'Your email will be kept confidential',
        'file_requirements' => 'Max. 10MB. Formats: JPG, PNG, PDF',
        'required_fields' => 'Fields marked with * are required',
        'budget_hint' => 'Budget helps us provide appropriate recommendations',
        'timeline_hint' => 'Timeline helps us prioritize your project',
        'description_hint' => 'Describe your needs, style preferences, and any special requirements',
    ],

    'help' => [
        'description' => 'Describe your needs, style preferences, and any special requirements.',
        'attachments' => 'You can upload reference images, floor plans, or documents (optional).',
    ],

];
