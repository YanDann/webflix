import MovieList from './Components/MovieList';
import './bootstrap';
import ReactDOM from 'react-dom/client';

const root = document.getElementById('root');

if (root) {
    ReactDOM.createRoot(root).render(<MovieList />);
}
