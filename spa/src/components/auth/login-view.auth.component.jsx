import React, {useState, useEffect} from 'react';
import axios from 'axios';
import isEmail  from 'validator/es/lib/isEmail';
import isLength  from 'validator/es/lib/isLength';
import {Form, Button, Alert} from 'react-bootstrap';

const initialFormFields = {
    email: {
        value: '',
        hasError: true,
        errorMessage: ''
    },
    password: {
        value: '',
        hasError: true,
        errorMessage: ''
    },
};

const LoginViewAuthComponent = () => {
    const [formFields, setFormFields] = useState(initialFormFields);
    const [status, setStatus] = useState({
        isValid: false,
        message: ''
    });
    
    const { email, password } = formFields;
    const {isValid, message} = status;

    const handleOnChange = (ev) => {
        ev.preventDefault();
        const {value, name} = ev.target;
        if (name === 'email') {
            if (!isEmail(value)) {
                setFormFields({
                    ...formFields, [name]: {
                        hasError: true, 
                        errorMessage: 'Email is not correct!!!', 
                        value: value
                    }
                });
                return;
            } 
        } else {
            if (!isLength(value, {min: 5})) {
                setFormFields({
                    ...formFields, [name]: {
                        hasError: true, 
                        errorMessage: 'Password is not correct, must be min 5 characters!!!', 
                        value: value
                    }
                });
                return;
            } 
        }
        setFormFields({
            ...formFields, [name]: {
                ...initialFormFields[name],
                hasError: false, 
                value
            }
        });
    }

    const handleOnSubmit = (ev) => {
        ev.preventDefault();

        if (email.hasError || password.hasError) {
            setStatus({
                isValid: false, message: 'Your password or email is incorrect!',
            });
            return;
        }

        // axios.defaults.headers.post['Content-Type'] = 'application/json';
        const request = axios.post('http://localhost:3030/login-react',
        {
            email: email.value,
            password: password.value
        });
        // axios({
        //     withCredentials: false,
        //     responseType: 'json',
        //     url: 'http://localhost:3030/login-react', 
        //     method: 'POST',
        //     data: {
        //         email: email.value,
        //         password: password.value
        //     }
        // });

        request.then((res) => {
            /**
             * {
                    errors: [],
                    user: {
                        "name": "Elman",
                        "age": 23
                    }
                }
             */
            const { data, status } = res;
            if (data && status === 200) {
                const { errors, user} = data;
                if (errors.length) {
                    setStatus({
                        isValid: false, message: errors.map((err) => {
                            return err.message + "; ";
                        })
                    });
                } else {
                    const {name, age} = user;
                    setStatus({isValid: true, 
                        message: 'All success . User : ' + name + ' which age is: ' + age });
                }
            }
            //const {data: { errors, user, status }} = res;

        });
        
        request.catch((err) => {
            setStatus({
                isValid: false, message: JSON.stringify(err)
            })
        });

    }

    return(<div>
        <h3>Login</h3>

        {
            message.length > 0 && 
                <Alert 
                    variant={isValid ? 'success' : 'danger'}
                    onClose={() => setStatus({ message: ''})} 
                    dismissible
                >
                    {message}
                </Alert>
        }

        <Form onSubmit={handleOnSubmit}>
            <Form.Group className="mb-3" controlId="formBasicEmail">
                <Form.Control
                    type="email" placeholder="Enter email"
                    onChange={handleOnChange}
                    name="email" value={email.value}
                    isValid={!email.hasError}
                    isInvalid={email.hasError && email.errorMessage.length > 0}
                />
                <Form.Text className="text-muted">
                    We'll never share your email with anyone else.
                </Form.Text>
                <Form.Control.Feedback type="valid">
                    All OK!!
                </Form.Control.Feedback>
                <Form.Control.Feedback type="invalid">
                    {email.errorMessage}
                </Form.Control.Feedback>
            </Form.Group>

            <Form.Group className="mb-3" controlId="formBasicPassword">
                <Form.Control
                    type="password" placeholder="Password"
                    onChange={handleOnChange}
                    name="password" value={password.value}
                    isValid={!password.hasError}
                    isInvalid={password.hasError && password.errorMessage.length > 0}
                />
                <Form.Control.Feedback type="invalid">
                    {password.errorMessage}
                </Form.Control.Feedback>
            </Form.Group>
            <Button 
                className="btn btn-success btn-block" 
                variant="primary" type="submit"
            >
                Login
            </Button>
        </Form>

    </div>);
}

export default LoginViewAuthComponent;
