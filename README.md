# Step Form Using Livewire in Laravel

## Instructions
Test Details:
- Create a new Laravel and Livewire application (you can use the latest version)
- Create a 2 page form (livewire form so both pages are on the same URL route). First page should have Next button, the second page should have Previous and Submit buttons. (Previous goes to page 1, where it should keep all of the form input user entered, the submit button submits the form, etc...)
- Page 1 fields:
- First name
- Last name
- Address
- City
- Country
- Date of birth (3 separate select fields month/day/year) - on the backend combine these so it's easy to save as date time field in MySQL.
- Page 2 fields:
- "Are you married?" - Yes/No
- If Yes, the following fields show up conditionally:
- Date of marriage - same logic as Date of birth (If date of marriage occurred before the user was 18 years old, show an error message "You are not eligible to apply because your marriage occurred before your 18th birthday." and do not allow submission of form.)
- Country of marriage
- If No, the following fields show up conditionally:
- Are you widowed? Yes/No
- Have you ever been married in the past? Yes/No
  Submit - Form submission should show a white page with output of the form results.

Review:
Please host the code so we can see a working site.

* Do not worry about the design/style of the form for now.
* We want to evaluate how the form functions when you're ready to show us.
* We want to evaluate how you developed the form, so we'll need access to the source code when it's ready.
* You will have up to 12 hours to complete this. You do not have to use all 12 hours if you think you can get it done sooner with good code readability, functionality, and performance

> ### Notes
> * I would have liked to investigated other possibilities to do multiple steps in a single form rather than a simple if statement in case there is a better accepted practice and to re-use for other future similar forms
> * I utilized LiveWire 2.5 based on the release date of 3 being so recent and more documentation and stability for this version
> * With more time and more requirements, the validation would be more specific
> * The database schema is basic, I would certainly design it differently with a little more time with multiple tables, more normalized with referential integrity

