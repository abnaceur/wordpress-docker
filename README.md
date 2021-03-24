<div align="center">
	<img src="./media/wordpress.png" alt="wordpress-docker" width="400" height="200">
	<h1>WordPress + Docker</h1>
	<p>
		<strong>A Dockerized WordPress boilerplate</strong>
	</p>

[![Version](https://img.shields.io/badge/WordPress--Docker-1.0.0-green)]() [![MIT License](https://img.shields.io/badge/License-MIT-green.svg?style=flat-square)](LICENSE)
</div>

<!-- ABOUT THE PROJECT -->
## About The Project

<p>This project is a kickoff boilerplate for WordPress with Docker</p>

## Getting Started

### Prerequisites
* Docker version >= 20.10.3
* docker-compose version >= 1.17.1

### Installation

1. Clone the repo
   ```sh
   git clone git@github.com:abnaceur/wordpress-docker.git
   ```

2. Unzip the WordPress file 
   ```sh
   unzip wordpress-5.7.zip
   ```

3. Copy the conf and Dockerfile
   ```sh
   cp -r setup/config wordpress/
   cp setup/Dockerfile wordpress/
   ```

4. Now build the project
   ```SH
   docker-compose up --build
   ```

5. Once all containers are up visit
   ```SH
   http://localhost fronend
   http://localhost/wp-admin admin
   http://localhost:8080 PhpMyAdmin
   ```
6. Follow the the WordPress GUI setup to start 
the application.

<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.

<!-- CONTACT -->
## Contact

Abdeljalil NACEUR - contact@naceur-abdeljalil.com
