import axios from 'axios';

class SearchService {
  async searchFor(val) {
    return await axios.get(`/search/${val}`);
  }
}

export default new SearchService();
