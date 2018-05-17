import moment from 'moment';

export default (developers, {text, programmingSearchText, languageSearchText, sortBy, startDate, endDate}) => {
    return developers.filter(developer => {
        const startDateMatch = startDate ? startDate.isSameOrBefore(moment(developer.created_at), 'day') : true;
        const endDateMatch = endDate ? endDate.isSameOrAfter(moment(developer.created_at), 'day') : true;
        const textMatch = developer.email.toLowerCase().includes(text.toLowerCase());
        
        const programmingSearchTextMatch = developer.programming_languages.map(programming_language => { return programming_language.name.includes(programmingSearchText)}).includes(true);
        const languageSearchTextMatch = developer.languages.map(language => { return language.code.includes(languageSearchText)}).includes(true);

        return startDateMatch && endDateMatch && textMatch && programmingSearchTextMatch && languageSearchTextMatch;
    }).sort((a, b) => {
        if(sortBy === 'date'){
          return a.created_at < b.created_at ? 1 : -1;
        }
    });
};