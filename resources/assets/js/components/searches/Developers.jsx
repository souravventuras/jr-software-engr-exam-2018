import React, { Component } from 'react';
import {connect} from 'react-redux';
import selectDevelopers from '../../selectors/selectDevelopers';
import selectLanguages from '../../selectors/selectLanguages';
import selectProgrammingLanguages from '../../selectors/selectProgrammingLanguages';

export class Developers extends Component {
    constructor(props) {
        super(props);
        this.state = {  }
    }
    render() { 
        return ( <div>Hi, i m Developer!</div> )
    }
}

const mapStateToProps = (state) => ({
    developers: selectDevelopers(state.developers, state.filters),
    languages: selectLanguages(state.languages, state.filters),
    programming_languages: selectProgrammingLanguages(state.programming_languages, state.filters)
});

export default connect(mapStateToProps)(Developers);