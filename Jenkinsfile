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
                cp docker-compose.yml ${DEPLOY_DIR}/

                cd ${DEPLOY_DIR}

                docker-compose up -d
                '''
            }
        }

        stage('Verify') {
            steps {
                sh 'docker ps'
            }
        }
    }

    post {
        success {
            echo 'WordPress Deployment Successful!'
        }
        failure {
            echo 'Deployment Failed!'
        }
    }
}
