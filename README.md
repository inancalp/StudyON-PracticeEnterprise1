## StudyON for the Course: Practice Enterprise 1
- Is an interactive web application for students to input questions they have think of during class or in their study sessions. With creating their study groups and the specified courses in it, they will challenge each other for to have as much as right answers possible from the questions they have created for each other. Main goal of the application is to encourage students to use “active recall” technique and be more prepared for the upcoming exams.
- I **HIGHLY RECOMMEND** you to check **"StudyON-FinalReport"** document for detailed explanations of any aspect of the project.

## Course: Practice Enterprise 1
- Empowers students to independently bring their ideas to life, from conception and planning to execution and presentation.
- Students are encouraged to be self-reliant, but dedicated educators are always available to provide guidance and support advice is needed.
- For more information: https://onderwijsaanbodmechelenantwerpen.thomasmore.be/syllabi/e/YT0865E.htm#activetab=doelstellingen_idp33936

## List of Features
- User authentication
- Study Groups
- QuizON
- RepeatON
- StudyChat
- Notifications
- Scheduled Executions


## How to Run the Project
- Clone the Project
- Set Up XAMPP (or Other Web and Database Servers):
    - Install and configure XAMPP (or any other web and database servers supported by Laravel). Ensure that Apache and MySQL are running.
- Set Up PHP:
    - Install PHP and add it to your system's PATH if it's not already done.
- Set Up Composer:
    - Install Composer and add it to your system's PATH if it's not already done.
- Open the Project with Your Preferred IDE:
    - Open the downloaded Laravel project in your desired Integrated Development Environment (IDE), such as VSCode.
- Configure the Environment Variables:
    - Locate the .env file in your Laravel project directory and make the following changes:
        - Change the APP_URL to your desired port (default: localhost:8000).
        - Change DB_DATABASE to your desired database name (default: studyon_alpha).
- Access the Project Directory with a CLI Tool:
    - Open your project directory in the CLI tool of your choice, such as VSCode's integrated terminal.
    - Execute the Following Commands:
        - Inside your project's path, run the following commands one by one:
            - composer install
            - composer update
            - php artisan migrate
            - php artisan key:generate
            - php artisan serve --port=<selected_port>
Following these steps should successfully set up and run your Laravel project.
