import React, { useEffect, useState, useRef } from 'react';
import axios from 'axios';
import parse from 'html-react-parser';
import {useAppContext} from '../context/providers/app.provider';
import {API_URL} from '../constants';
import LoaderComponent from '../components/loader/loader-component';
import HeaderComponentCommon from '../components/common/header-component.common';


const HomePage = () => {
    // http://rangers.sev/wp-json/wp/v2/pages/12
    // title / content
    // 

    //const [{themeMode}] = useAppContext();
    const [appState] = useAppContext();
    const {themeMode} = appState;
    
    const [isLoading, setIsLoading] = useState(false);
    const [data, setData] = useState({
        title: '', content: ''
    });
    const {title, content} = data;

    useEffect(() => {
        console.log('Home Page Mounted', API_URL);
        setIsLoading(true);
        axios.get(API_URL + '/pages/12')
            .then((resp) => {
                const {status, data} = resp;
                // const status = resp.status
                // const data = resp.data;
                if (status === 200 && typeof data === "object") {
                    const _t = data.title.rendered;
                    const _c = data.content.rendered;
                    setData({
                        title: _t, content: parse(_c)
                    });

                    // setTimeout(() => {
                    //     setData({
                    //         title: "UUUUU", content: "IIIIII"
                    //     });
                    // }, 10000);
                }
                console.log("We have response >> ", resp);
                setIsLoading(false);
            })
            .catch((err) => {
                console.log("We have error > ", err);
                setIsLoading(false);
            })
            ;
        console.log('');
        return function() {
            console.log('Home Page Unmounted!!!');
        }
    }, []);

    useEffect(() => {
        // return () => {
        //     console.log('State Unmounted');
        // }
    }, [data]);

    const mainContent = () => {
        return (
            <div>
                <HeaderComponentCommon headerTitle={title} />
                <section className="uuu">{content}</section>
            </div>
        )
    }

    return (
        <div>
            { isLoading 
                ? <LoaderComponent /> 
                : mainContent()
            }

        </div>
    );
}

export default HomePage;