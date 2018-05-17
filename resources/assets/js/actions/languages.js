export const setLanguages = (languages) => ({
    type: 'SET_LANGUAGES',
    languages
});

export const startSetLanguages = () => {
    return (dispatch) => {
        return axios.get('/languages').then(response => {
            dispatch(setLanguages(response.data));
        }).catch(error => {
            console.log(error.message);
        });
    }
}