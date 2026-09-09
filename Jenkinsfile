pipeline {
    agent any

    environment {
        DEPLOY_DIR = "/deployment"
    }

    stages {

        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Deploy') {
            steps {
                sh '''
                echo "Deploying WordPress..."

                cd ${DEPLOY_DIR}

                git pull origin main

                docker compose down

                docker compose up -d
                '''
            }
        }

        stage('Deploy Theme') {
            steps {
                sh '''
                echo "Deploying Custom Theme..."

                docker cp ${DEPLOY_DIR}/theme/mytheme/. wordpress_demo-wordpress-1:/var/www/html/wp-content/themes/mytheme/
                '''
            }
        }

        stage('Verify') {
            steps {
                sh '''
                echo "Running Containers:"
                docker ps
                '''
            }
        }
    }

    post {
        success {
            echo '✅ WordPress Deployment Is Successful!'
        }

        failure {
            echo '❌ Deployment Failed!'
        }
    }
}
