# tourism-radium
Wordpress build for Tourism Radium using Local app.

## Set up Sass local dev
https://webdesign.tutsplus.com/tutorials/watch-and-compile-sass-in-five-quick-steps--cms-28275

```
npm run scss
```
Run this in the /tourismradium theme folder. This will compile the .scss file saved into css in the /css folder.

Test from linux.

## Local Sass updates October 2024
node-sass is deprecated, so upgraded to Dart Sass
https://dev.to/ccreusat/migrating-from-node-sass-to-sass-dart-sass-with-npm-3g3c

When spin up new local, go to the themes/tourismradium folder
```npm i```

Things under "scripts" in package.json were updated, can tweak further if needed. This will watch and compile:
```
npm run sass:watch
```

## Font Awesome
At launch we used Font Awesome library, but we were going over page view limits so switched out to use SVG files.

These are free files using for Search, Instagram, TikTok, Facebook and YouTube:
https://www.iconfinder.com/search?q=search&price=free