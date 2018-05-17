export const setProgrammingLanguages = (programming_languages) => ({
    type: 'SET_PROGRAMMING_LANGUAGES',
    programming_languages
});

export const startSetProgrammingLanguages = () => {
    return (dispatch) => {
        return axios.get('/programming_languages').then(response => {
            dispatch(setProgrammingLanguages(response.data));
        }).catch(error => {
            console.log(error.message);
        });
    }
}

export const getProgrammingLanguagesByDeveloperId = (programming_languages) => ({
    type: 'SET_PROGRAMMING_LANGUAGES_DEVELOPER_ID',
    programming_languages
});

export const startGetProgrammingLanguagesByDeveloperId = (id) => {
    return (dispatch) => {
        return axios.get(`/programming_languages/${id}`).then(response => {
            dispatch(getProgrammingLanguagesByDeveloperId(response.data));
        }).catch(error => {
            console.log(error.message);
        });
    }
}