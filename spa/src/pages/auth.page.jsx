import React, {useState} from 'react';
import {Container, Row, Col} from 'react-bootstrap';
import LoginViewAuthComponent from '../components/auth/login-view.auth.component';
import SignUpViewAuthComponent from '../components/auth/signup-view.auth.component';

const AuthPage = () => {
    const [isLoginView, setIsLoginView] = useState(true);

    return(
        <Container fluid>
            <Row className="justify-content-md-center">
                <Col xs lg='6' md='8'>
                    <h1 className="page-header text-center">Auth Page</h1>
                    <div className="text-center">
                        {isLoginView 
                            ? <LoginViewAuthComponent /> 
                            : <SignUpViewAuthComponent />}
                        
                        <h5>
                        {
                            isLoginView
                                ? 'If you\'re still not registered, register from '
                                : 'If you already signed up, login from '

                        }
                            <button 
                                className="btn btn-link" 
                                onClick={() => {setIsLoginView(!isLoginView)}}
                            > here </button>
                        </h5>
                    </div>
                    
                </Col>
            </Row>
        </Container>
    );
}

export default AuthPage;