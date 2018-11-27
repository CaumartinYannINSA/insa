stage('checkout')
{
    node('master')
    {
        checkout(
            changelog: false, 
            poll: false, 
            scm: 
            [
                $class: 'GitSCM', 
                branches: 
                [
                    [name: '*/dev']
                ], 
                doGenerateSubmoduleConfigurations: false, 
                extensions: [], 
                submoduleCfg: [], 
                userRemoteConfigs: 
                [
                    [url: 'https://github.com/CaumartinYannINSA/insa']]
                ]
            )
    }
}
stage('UnitTesting')
{
    node('master')
    {
        sh(returnStatus: true, script: 
        '''cd poneys
           composer install
           ./vendor/bin/phpunit tests/PoneysTest.php --log-junit report.xml''')
    }
}
stage('PublishResults')
{
    node('master')
    {
        junit('poneys/report.xml')
    }
}
