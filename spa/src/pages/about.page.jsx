import React, {useEffect, Fragment} from 'react';

import {useAppContext, appActionTypes} from '../context/providers/app.provider';

const AboutPage = () => {
    const [appState, appDispatch] = useAppContext();
    const {themeMode} = appState;

    useEffect(() => {
        console.log("About Page mounted");
        return () => {
            console.log("About Page UNmounted");
        }
    }, []);

    const handleChangeTheme = (ev) => {
        appDispatch({
            type: appActionTypes.CHANGE_THEME_MODE, 
            payload: {
                themeMode: (themeMode == 'white' ? 'red' : 'white')
            }
        });
    }

    return (
        <Fragment>
            <h1>This is About Page</h1>
            <h5>Our theme is {themeMode}</h5>
            <button onClick={handleChangeTheme}>
                Change Theme Mode
            </button>
        </Fragment>
    );
}

export default AboutPage;
