Project Setup Guide
Installation
Install Dependencies
Run the following command to install necessary packages:

npm install
Compile Assets
For compiling SCSS and JavaScript files, use one of the following commands:

To run once:
gulp
To watch for changes:
gulp watch

Build for Production
Before deploying to the server, create the production build by running:
npm run build

Adding New Features
Adding a New ACF Block
Create a new PHP file for the block inside the /blocks folder.
No further setup is required as blocks are automatically registered.

Adding a New SCSS File
Place your new SCSS file in the /assets/scss/ folder.
It will automatically be included in the compilation process.

Adding a New JavaScript File
Place your new JavaScript file in the /assets/js/ folder.
It will automatically be included in the compilation process.

Data Import Process
Update the CSV Data
Ensure your updated data file matches the original filename:
data/all_states_college_survey_full.csv

Run the Import Command
Connect to the site shell, navigate to the root directory where wp.config is located, and run:
wp import_csv