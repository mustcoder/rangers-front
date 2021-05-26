import React, { useEffect, useRef } from 'react';

const HomePage = () => {
    const [ourColor, setOurColor] = React.useState('blue');
    const [ourPadding, setOurPadding] = React.useState('10px');

    useEffect(() => {
        console.log('Mounted');
        return () => {
            console.log('Unmounted!!!');
        }
    }, []);

    useEffect(() => {
        console.log("Updated", ourColor, ourPadding);
    }, [ourColor, ourPadding]);

    console.log('Re-rendered');

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
            <button onClick={handleButtonClick}>Click Me!!</button>
        </div>
    );
}

export default HomePage;