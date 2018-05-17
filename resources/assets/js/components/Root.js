import React from 'react';
import ReactDOM from 'react-dom';

const Root = () => {
    return <div>Hello !</div>
}
 
export default Root;

if (document.getElementById('app')) {
    ReactDOM.render(<Root />, document.getElementById('app'));
}