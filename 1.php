<?php
session_start();
$xml = simplexml_load_file( 'db.xml' );
$signin_login = $_POST['login1'];
$signin_password = $_POST['password1'];
$signup_login = $_POST['login'];
$signup_password = $_POST['password'];
$signup_name = $_POST['name'];
$signup_email = $_POST['email'];
$_logins = array();
$_passwords = array ();
$_emails = array();
foreach ( $xml->xpath( '//login' ) as $login ) {
    $_logins[] = $login;
}
foreach ( $xml->xpath( '//password' ) as $password ) {
    $_passwords[] = $password;
}
foreach ( $xml->xpath( '//email' ) as $email ) {
    $_emails[] = $email;
}

authorization( $signin_login );

registration( $signup_login, $signup_email );

function authorization() {
    global $_logins, $_passwords, $signin_login, $signin_password;
    foreach ( $_logins as $login_key=>$login ) {
        if ( $signin_login == trim( $login ) ) {
            foreach ( $_passwords as $pass_key=>$password ) {
                if ( $login_key == $pass_key ) {
                    $result = array(
                        'signin_login' => $login,
                        'signin_password' =>$signin_password
                    );
                    $_SESSION['user'] = [
                        'login' => $result['signin_login'],
                        'password' => $result['signin_password']

                    ];
                    return( echo json_encode( $result ) );
                }

            }
        }
    }
}

function registration() {
    global $xml, $_logins, $_passwords, $_emails, $signup_name, $signup_login, $signup_email, $signup_password;
    $i = 0;
    $e = 0;
    $new_login = 0;
    $new_email = 0;
    foreach ( $_logins as $login_key=>$login ) {
        if ( $signup_login != trim( $login ) ) {
            $i = $i+1;
        }
        if ( $i == count( $_logins ) ) {
            $new_login = $signup_login;
        }
    }
    foreach ( $_emails as $email_key=>$email ) {
        if ( $signup_email != trim( $email ) ) {
            $e = $e+1;
        }
        if ( $e == count( $_emails ) ) {
            $new_email = $signup_email;
        }
    }
    if ( ( $i == count( $_logins ) ) && ( $e == count( $_emails ) ) ) {
        $result = array(
            'signup_login' => $new_login,
            'signup_password' => $signup_password
            'name' => $signup_name,
            'email' => $new_email
        );
        $add_child = $xml->addChild( 'user' );
        $add_child -> addChild( 'name', $result['name'] );
        $add_child -> addChild( 'login', $result['signup_login'] );
        $add_child -> addChild( 'email', $result['email'] );
        $add_child -> addChild( 'password', 'salt' . sha1( $result['signup_password'] ) );
        $xml -> asXML( 'db.xml' );

        echo json_encode( $result );
    }
    if ( ( $i == count( $_logins ) ) xor ( $e == count( $_emails ) ) ) {
        // some text, that displayed on registration form
    }
}

