export const setDevelopers = (developers) => ({
    type: 'SET_DEVELOPERS',
    developers
});

export const startSetDevelopers = () => {
    return (dispatch) => {
        return axios.get('/developers').then((response) => {
            dispatch(setDevelopers(response.data));
        }).catch((error) => {
            console.log(error.message);
        });
    }
};