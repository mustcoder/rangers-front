import React from 'react';
import { string } from 'prop-types';

const HeaderComponentCommon = ({ headerTitle }) => {
    return (
        <h1 className="iii">{headerTitle}</h1>
    );
}

HeaderComponentCommon.propTypes = {
    headerTitle: string.isRequired
}

export default HeaderComponentCommon;