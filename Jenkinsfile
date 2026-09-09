pipeline {
    agent any

    stages {

        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Deploy') {
            steps {
                sh '''
                cd $WORKSPACE
                docker-compose down
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
