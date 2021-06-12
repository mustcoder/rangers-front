import React, {useState, useEffect} from 'react';
import axios from 'axios';
import isEmail  from 'validator/es/lib/isEmail';
import isLength  from 'validator/es/lib/isLength';
import {Form, Button, Alert} from 'react-bootstrap';
import { error } from 'jquery';

const initialFormFields = {
    name1: {
        value: '',
        hasError: true,
        errorMessage: ''
    },
    surName: {
        value: '',
        hasError: true,
        errorMessage: ''
    },
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
    rePassword: {
        value: '',
        hasError: true,
        errorMessage: ''
    }

};

const SignUpViewAuthComponent = () => {
    const [formFields, setFormFields] = useState(initialFormFields);
    const [status, setStatus] = useState({
        isValid: false,
        message: ''
    });

   
    const {name1, surName, email, password, rePassword } = formFields;
    const {isValid, message} = status;

    const onName = (ev) => {
        ev.preventDefault();
        const {value, name} = ev.target;
        if (name === 'name1' || name === 'surName') {
            
                setFormFields({
                    ...formFields, [name]: {
                        hasError: true, 
                        errorMessage: 'Name field is empty!!!', 
                        value: value
                    }
                });
                return;
             
        }    




    }

  
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
                    errros: [],
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
        <h3>Sign Up</h3>

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
            

            <Form.Group className="mb-3" controlId="formBasicName">
                <Form.Control
                    type="text" placeholder="Enter your name"
                    onChange={onName}
                    name="name1" value={name1.value}
                />                        
            </Form.Group>

            <Form.Group className="mb-3" controlId="formBasicSurName">
                <Form.Control
                    type="text" placeholder="Enter your Surname"
                    onChange={onName}
                    name="surName" value={surName.value}
                />                        
            </Form.Group>


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
                    isValid={!password.hasError && password.value === rePassword.value}
                    isInvalid={password.hasError && password.errorMessage.length > 0  }
                />
                <Form.Control.Feedback type="invalid">
                    {password.errorMessage}
                </Form.Control.Feedback>
            </Form.Group>

            <Form.Group className="mb-3" controlId="formBasicRePassword">
                <Form.Control
                    type="password" placeholder="Confirm Password"
                    onChange={handleOnChange}
                    name="rePassword" value={rePassword.value}
                    isValid={!rePassword.hasError && password.value === rePassword.value}
                    isInvalid={rePassword.hasError && rePassword.errorMessage.length > 0 }
                />
                <Form.Control.Feedback type="invalid">
                    {password.errorMessage}
                </Form.Control.Feedback>
            </Form.Group>

            <Button 
                className="btn btn-success btn-block" 
                variant="primary" type="submit"
            >
                Sign Up
            </Button>
        </Form>

    </div>);

}

export default SignUpViewAuthComponent;