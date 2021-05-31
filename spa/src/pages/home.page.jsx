import React, { useEffect, useRef } from 'react';
import {useAppContext} from '../context/providers/app.provider';


const HomePage = () => {
    //const [{themeMode}] = useAppContext();
    const [appState] = useAppContext();
    const {themeMode} = appState;
    
    const [ourColor, setOurColor] = React.useState('blue');
    const [ourPadding, setOurPadding] = React.useState('10px');


    useEffect(() => {
        console.log('Home Page Mounted');
        console.log("GET SERVER INTIAL DATA!!!");
        return function() {
            console.log('Home Page Unmounted!!!');
        }
    }, []);

    useEffect(() => {
        console.log("Updated", ourColor, ourPadding);
        // return () => {
        //     console.log('State Unmounted');
        // }
    }, [ourColor, ourPadding]);

    const handleButtonClick = (ev) => {
        setOurColor(ourColor == 'red' ? 'blue' : 'red');
        setOurPadding(ourPadding === '100px' ? '10px' : '100px');
    }

    return (
        <div>
            <h1>This is 
                <span style={
                    {
                        color: ourColor,
                        paddingLeft: ourPadding,
                        minWidth: '35px'
                    }
                }>Home Page</span>
            </h1>
            <h5>HOME Our theme is {themeMode}</h5>
            <button onClick={handleButtonClick}>Click Me!!</button>
        </div>
    );
}

export default HomePage;