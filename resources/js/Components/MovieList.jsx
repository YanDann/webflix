import axios from "axios";
import { useEffect, useState } from "react";
import Movie from "./Movie";

function MovieList() {
    const [movies, setMovies] = useState([]);
    const [loading, setLoading] = useState(false);
    const [search, setSearch] = useState('');
    const searched = () => {
        return movies.filter(movie => {
            return movie.title.toLowerCase().includes(search.toLowerCase());
        });
    }
    const [url, setUrl] = useState('http://localhost:8000/api/movies');

    const fetchData = () => {
        setLoading(true);
        // Requête sur l'API pour aller chercher les films
        axios.get(url).then((response) => {
            setTimeout(() => {
                setMovies([...movies, ...response.data.data]); // On combine le tableau existant à chaque "pagination"
                setLoading(false);
                setUrl(response.data.next_page_url); // Laravel nous fournit la page suivante ou null si c'est la last
            }, 1000) // là, on recupère les films
        });
    }

    const handleScroll = () => {
        // On doit "savoir" quand on est en bas de la page
        let diff = document.body.offsetHeight - (window.innerHeight + window.scrollY);

        if (diff <= 100 && !loading && url) { // Pour éviter de spam le scroll
            fetchData();
        }
    }

    useEffect(() => {
        fetchData(); // J'ai rangé la récupération des données pour pouvoir appeler la fonction plus rapidement
    }, []); // [] vide => 1 seule requête

    if (loading && false) {
        return (
            <div className="text-center my-5">
                <div className="spinner-grow"></div>
            </div>
        );
    }

    useEffect(() => {
        // Chaque fois que le state de loading change, on doit supprimer le listener et le recréer pour que la fonction accède au tableau movies à jour
        window.addEventListener('scroll', handleScroll);

        return () => window.removeEventListener('scroll', handleScroll);
    }, [loading])

    return (
        <div>

            <div className="d-flex justify-content-between">
                <h1>Les films</h1>
                <div>
                    <input type="text" className="form-control"
                        placeholder="Recherche..."
                        value={search}
                        onChange={(event) => setSearch(event.target.value)} />
                </div>
            </div>
            <div class="row row-cols row-cols-sm-1 row-cols-md-2 row-cols-lg-4 my-5">
                {searched().map((movie, index) => <Movie key={index} movie={movie} />)}
            </div>
            {loading && <div className="text-center my-5">
                <div className="spinner-grow">
                </div>
            </div>}
        </div>
    );
}

export default MovieList;