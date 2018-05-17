import React, {Component} from 'react';
import {connect} from 'react-redux';
import selectDevelopers from '../../selectors/selectDevelopers';
import selectLanguages from '../../selectors/selectLanguages';
import selectProgrammingLanguages from '../../selectors/selectProgrammingLanguages';
import {setTextFilter, sortByDate, setStartDate, setEndDate} from '../../actions/filters';
import {startGetProgrammingLanguagesByDeveloperId} from '../../actions/programmingLanguages';

export class Developers extends Component {
  constructor(props) {
    super(props);
    this.state = {}

    // this.onTextChange = this.onTextChange.bind(this); this.onSortChange =
    // this.onSortChange.bind(this);
  }

  //   onTextChange = (e) => {     this.props.setTextFilter(e.target.value);   };
  // onSortChange = (e) => {     if (e.target.value === 'date') {
  // this.props.sortByDate(e.target.value);     } else if (e.target.value ===
  // 'amount') {       this.props.sortByAmount(e.target.value);     }   };

  render() {
    return (
      <div>
        <div className="row">
          <div className="col-lg-4 col-md-6">
            <input
              type="text"
              className="form-control mb-1"
              placeholder="Search..."
              defaultValue={this.props.filters.text}
              onChange={(e) => {this.props.setTextFilter(e.target.value)}}/>
          </div>
          <div className="col-lg-4 col-md-6">
            <div className="input-group mb-1">
              <div className="input-group-prepend">
                <span className="input-group-text">Programming Language</span>
              </div>
              <select
                className="custom-select"
                defaultValue={this.props.filters.sortBy}
                onChange={this.onSortChange}>
                <option value=""></option>
                {
                    this.props.programming_languages.map((programming_language) => {
                        return <option key={programming_language.id} value={programming_language.name}>{programming_language.name}</option>
                    })
                }
              </select>
            </div>
          </div>
          <div className="col-lg-4 col-md-6">
            <div className="input-group mb-1">
              <div className="input-group-prepend">
                <span className="input-group-text">Language</span>
              </div>
              <select
                className="custom-select"
                defaultValue={this.props.filters.sortBy}
                onChange={this.onSortChange}>
                <option value=""></option>
                {
                    this.props.languages.map((language) => {
                        return <option key={language.id} value={language.code}>{language.code}</option>
                    })
                }
              </select>
            </div>
          </div>
        </div>
        <table className="table table-sm mt-4">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Email</th>
              <th scope="col">Programming languages</th>
              <th scope="col">Languages</th>
            </tr>
          </thead>
          <tbody>
            {this
              .props
              .developers
              .map((developer, i) => {
                return <tr key={developer.id}>
                  <th scope="row">{i + 1}</th>
                  <td>{developer.email}</td>
                  <td>
                    kk
                  </td>
                  <td>@mdo</td>
                </tr>
              })}

          </tbody>
        </table>
      </div>
    )
  }
}

const mapStateToProps = (state) => ({
  developers: selectDevelopers(state.developers, state.filters),
  languages: selectLanguages(state.languages, state.filters),
  programming_languages: selectProgrammingLanguages(state.programming_languages, state.filters),
  filters: state.filters
});
const mapDispatchToProps = (dispatch) => ({
  setTextFilter: (text) => dispatch(setTextFilter(text)),
  sortByDate: () => dispatch(sortByDate()),
  setStartDate: (date) => dispatch(setStartDate(date)),
  setEndDate: (date) => dispatch(setEndDate(date))
});

export default connect(mapStateToProps, mapDispatchToProps)(Developers);