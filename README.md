#  GitHub Status
Baseado no app-ideas beginners [GitHub-Status-App](https://github.com/florinpop17/app-ideas/blob/master/Projects/1-Beginner/GitHub-Status-App.md)

**Tier:** 1-Beginner

## User Stories

-   [X] User can see the current status for GitHub Git operations, API Requests,
Operational Issues, PRs, Dashboard, & Projects, Operational Notifications,
Operational Gists, and Operational GitHub Pages as a list in the main app
window.
-   [ ] User can retrieve the most recent status from the GitHub Status web
site by clicking a 'Get Status' button.
-   [ ] User can see any of the GitHub components that are not in 'Operational'
status highlighted by a different color, background animation, or any other
technique to make it stand out. Use your imagination!

## Useful links and resources

- [Web Scraping (Wikipedia)](https://en.wikipedia.org/wiki/Web_scraping)
- [NPM Request](https://www.npmjs.com/package/request)
- [Javascript JSON (MDN)](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/JSON)
- [Javascript Object Notation](https://json.org/)

## Example projects

- [Peter Luczynski's example](https://peterluczynski.github.io/github-status/)
- [Diogo Moreira's example](https://diogomoreira.github.io/github-status/)


## How to run

1. Start the Application
~~~sh
cd docker/
docker-compose up -d --build
~~~
2. Install the dependencies
~~~sh
docker exec -it app bash
composer install
~~~
3. Open your web browser and navigate to localhost:80
~~~sh
localhost:80
~~~