# Markdown to HTML

![Last Commit](https://img.shields.io/github/last-commit/Siphon880gh/markdown-to-html-wrapper/main)
<a target="_blank" href="https://github.com/Siphon880gh" rel="nofollow"><img src="https://img.shields.io/badge/GitHub--blue?style=social&logo=GitHub" alt="Github" data-canonical-src="https://img.shields.io/badge/GitHub--blue?style=social&logo=GitHub" style="max-width:8.5ch;"></a>
<a target="_blank" href="https://www.linkedin.com/in/weng-fung/" rel="nofollow"><img src="https://img.shields.io/badge/LinkedIn-blue?style=flat&logo=linkedin&labelColor=blue" alt="Linked-In" data-canonical-src="https://img.shields.io/badge/LinkedIn-blue?style=flat&amp;logo=linkedin&amp;labelColor=blue" style="max-width:10ch;"></a>
<a target="_blank" href="https://www.youtube.com/@WayneTeachesCode/" rel="nofollow"><img src="https://img.shields.io/badge/Youtube-red?style=flat&logo=youtube&labelColor=red" alt="Youtube" data-canonical-src="https://img.shields.io/badge/Youtube-red?style=flat&amp;logo=youtube&amp;labelColor=red" style="max-width:10ch;"></a>

By Weng Fei Fung. 

Show md files in a readable HTML format on web browser for your users. This also generates a table of contents that is easy to access at the top right. The table of contents has jump links for easy navigation to headings/sections.

There are two versions of the code at `html/` and at `php/`. Use the static HTML version if you are only showing one md file to the user. For dynamically loading md files, use the PHP script, which allows you to load different md files based on the search parameters in the URL.

## HTML wrapper to view markdown files:
- script block has fetch to markdown path.
- image path must properly defined in the markdown file.
Visit like so (Adjust your domain and base url as necessary):
```
http://localhost:8888/markdown-to-html-wrapper/html/
```

## PHP script to view markdown files:
- filepath: path to the markdown file
- imagepath: path to the images folder. T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEVets prepended to the image path in the markdown file.
Visit like so (Adjust your domain and base url as necessary):
```
http://localhost:8888/markdown-to-html-wrapper/php/?filepath=md/android-c7/Enter%20numbers%20during%20call.md&imagepath=md/_Attachments
```