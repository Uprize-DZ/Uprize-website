# Livewire Services Admin Component -- Full Beginner Explanation

------------------------------------------------------------------------

# Overview

This Livewire component is responsible for managing **Services** inside
an admin panel.

It allows the admin to:

-   Create a new service
-   Upload an image (stored locally)
-   Upload a video (stored in Cloudinary)
-   Edit existing services
-   Replace images and videos
-   Delete services
-   Toggle active/inactive status
-   Display all services

------------------------------------------------------------------------

# General Architecture

This component connects:

-   Blade View → livewire.admin.services.edit
-   Database → Services model
-   Local Storage → Images
-   Cloudinary → Videos

------------------------------------------------------------------------

# Class Definition

``` php
class Edit extends Component
```

This means:

-   It is a Livewire component
-   It extends the base Livewire Component class
-   Livewire automatically connects it to a Blade view

------------------------------------------------------------------------

# WithFileUploads Trait

``` php
use WithFileUploads;
```

This trait allows Livewire to handle file uploads such as images and
videos.

------------------------------------------------------------------------

# Layout Attribute

``` php
#[Layout('components.layouts.admin')]
```

This wraps the component inside the admin layout automatically.

------------------------------------------------------------------------

# Public Properties

Public properties are automatically connected to form inputs using:

``` html
wire:model="propertyName"
```

Example:

``` php
public $title;
```

Livewire keeps the input and property synchronized.

------------------------------------------------------------------------

# Validation Rules

``` php
protected function rules()
```

Defines validation rules.

Important logic:

``` php
'image' => $this->editingId 
    ? 'nullable|image|max:2048' 
    : 'required|image|max:2048',
```

If editing → image optional\
If creating → image required

------------------------------------------------------------------------

# updatedVideo()

Runs automatically when the video property changes.

It validates the selected video file immediately.

------------------------------------------------------------------------

# store() -- Create Service

Steps:

1.  Validate input
2.  Store image locally
3.  Upload video to Cloudinary (if exists)
4.  Save data in database
5.  Reset form
6.  Dispatch success message

------------------------------------------------------------------------

# edit(\$id)

Loads service data into edit form.

-   Finds service by ID
-   Fills edit properties
-   Stores current video URL for preview

------------------------------------------------------------------------

# update()

Updates an existing service.

Steps:

1.  Validate edit fields
2.  Find service
3.  Prepare update array
4.  Replace image if new one selected
5.  Replace video if new one selected
6.  Update database
7.  Exit edit mode

------------------------------------------------------------------------

# toggleActive(\$id)

Reverses the boolean value of is_active.

------------------------------------------------------------------------

# delete(\$id)

Steps:

1.  Find service
2.  Delete local image
3.  Delete Cloudinary video
4.  Delete database record

------------------------------------------------------------------------

# render()

``` php
return view('livewire.admin.services.edit', [
    'services' => Services::latest()->get()
]);
```

Loads the Blade view and sends all services ordered by newest first.

------------------------------------------------------------------------

# Overall Logic Flow

Create → Validate → Store Files → Save Database\
Edit → Load → Modify → Replace Files → Update Database\
Delete → Remove Files → Delete Database

------------------------------------------------------------------------

This component demonstrates real-world backend handling including
validation, file management, Cloudinary integration, and safe error
handling.
