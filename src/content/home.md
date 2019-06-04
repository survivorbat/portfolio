## Maarten.dev

Welcome to maarten.dev! This is the web page where I showcase my projects, talk
about my experience in (web) development and show off some of the stuff and techniques that I
learned along the way. I also put down a list of things that I want to research in the future.

This website consists of an Nginx web server that offloads SSL/TLS running in front of a
NodeJS application that serves HTML pages. These pages are created using Twig, a templating
engine that I often use in Symfony applications and styling is done with Sass stylesheets.

Both the Nginx and the NodeJS app run in Docker containers that are automatically deployed
using an Ansible script. Anytime I save new changes to my code on GitHub a Travis-CI pipeline
runs and automatically deploys these new changes to my virtual Linux server(s).

You might have guess from this little introduction that I'm more into backend/DevOps than
frontend development, this is true since I find myself often having more fun with setting
up environments and servers than styling web pages. You can find more information on
who I am and why I love what I do on the [About Me](/about) page.

Feel free to have a look! :)