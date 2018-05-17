import React from 'react';
import ReactDOM from 'react-dom';
import {connect, Provider} from 'react-redux';
import configureStore from '../store/configureStore';
import Developers from '../components/searches/Developers';
import {startSetDevelopers} from '../actions/developers';
import {startSetLanguages} from '../actions/languages';
import {startSetProgrammingLanguages} from '../actions/programmingLanguages';

const store = configureStore();

const jsx = (
    <Provider store={store}>
        <Developers />
    </Provider>
);

ReactDOM.render(<div className="loader"><img src="/images/loader.gif"/></div>, document.getElementById('app'));

store.dispatch(startSetDevelopers()).then(() => {
    store.dispatch(startSetLanguages()).then(() => {
        store.dispatch(startSetProgrammingLanguages()).then(() => {
            if (document.getElementById('app')) {
                ReactDOM.render(jsx, document.getElementById('app'));
            }
        })
    })
})