# Web &amp; Mobile Server-side - workshop materials
Interactive workshop slides for the course Web &amp; Mobile Server-side, part of the Professional Bachelor ICT study program.

## Installation instructions

### Running the slides without working code examples
* Install [git](https://git-scm.com/downloads) and run from your terminal/cmd
```shell
git clone https://github.com/mjoris/workshops-wmss.git
```
* Open the file <code>workshops-wmss/app/html/index.html</code> in a browser

### Running the slides with working code examples
* Install [git](https://git-scm.com/downloads) and [Docker Desktop](https://www.docker.com/products/docker-desktop).
* Start the Docker Desktop application
* Run from your terminal/cmd
```shell
git clone https://github.com/mjoris/workshops-wmss.git
```
* When Docker is up and running, run from your terminal/cmd
```shell
cd workshops-wmss
docker-compose up
```
* Browse to [http://localhost:8080](http://localhost:8080)
* Stop the environment in yout terminal/cmd by pressing <code>Ctrl+C</code>

## Recipes and troubleshooting

### Updating the course materials 
* Run from your terminal/cmd, in your <code>workshops-wmss</code> directory
```shell
git reset --hard
git pull origin master
```

### <code>docker-compose up</code> does not start one or more containers
* Look at the output of <code>docker-compose up</code>. When a container (fails and) exits, it is shown as the last line of the container output (colored tags by container)
* Alternatively, start another terminal/cmd and inspect the output of <code>docker-compose ps -a</code>. You can see which container exited, exactly when.
* Probably one of the containers fails because TCP/IP port 8000, 8080 or 3307 is already in use on your system. Stop the environment, change the port in <code>docker-compose.yml</code> en rerun <code>docker-compose up</code>.

### Restoring the database (tables)
Might be necessary when this repository contains database updates.
* Before running <code>docker-compose up</code>, delete all files in the <code>mysql-data</code> directory
