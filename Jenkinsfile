pipeline {

    agent any

    environment {
        PROJECT_DIR = "/opt/Wordpress_demo"
    }

    stages {

        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Copy Files') {
            steps {
                sh '''
                cp docker-compose.yml ${PROJECT_DIR}/
                '''
            }
        }

        stage('Deploy') {
            steps {
                sh '''
                cd ${PROJECT_DIR}

                docker-compose down

                docker-compose up -d
                '''
            }
        }

        stage('Verify') {
            steps {
                sh '''
                docker ps
                '''
            }
        }

    }

    post {

        success {
            echo "WordPress Deployment Successful!"
        }

        failure {
            echo "Deployment Failed!"
        }

    }

}
