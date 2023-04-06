To Develop this theme:

First you must run npm install in the theme directory, once the node modules have been built 
then to compile the css and JS you must run any of the following commands
npm run development (compiles once)
npm run watch (compiles after every change runs in background)
npm run production (compiles once)

Order of CSS:
Theme.json edits admin and this to a certain extent is passed to the front end
assets/css/style-editor this can be used to style both the front end and admin (only really used to promote consistency in gutenberg and page content areas)
Tailwindcss this is the main controller in the front end this should override the above.