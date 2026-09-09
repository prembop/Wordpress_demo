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
            echo '✅ WordPress Deploymenti Is Successful!'
        }

        failure {
            echo '❌ Deployment Failed!'
        }
    }
}
