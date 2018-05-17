import {createStore, combineReducers, applyMiddleware} from 'redux';
import thunk from 'redux-thunk';
import {developersReducer} from '../reducers/developersReducer';
import {languagesReducer} from '../reducers/languagesReducer';
import {programmingLanguagesReducer} from '../reducers/programmingLanguagesReducer';
import {filtersReducer} from '../reducers/filtersReducer';

export default() => {

  const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

  const store = createStore(combineReducers({
      developers: developersReducer,
      languages: languagesReducer,
      programming_languages: programmingLanguagesReducer,
      filters: filtersReducer
    }), 
    composeEnhancers(applyMiddleware(thunk))
  );

  return store;
}