import axios from "axios";
import { useEffect, useState } from "react";
import Movie from "./Movie";

function MovieList() {
    const [movies, setMovies] = useState([]);
    const [loading, setLoading] = useState(false);

    useEffect(() => {
        setLoading(true);
        // Requête sur l'API pour aller chercher les films
        axios.get('http://localhost:8000/api/movies').then((response) => {
            console.log(response.data);
            setTimeout(() => {
                setMovies(response.data);
                setLoading(false);
            }, 1000) // là, on recupère les films
        });
    }, []); // [] vide => 1 seule requête

    if (loading) {
        return (
            <div className="text-center my-5">
                <div className="spinner-grow"></div>
            </div>
        );
    }

    return (
        <div>
            <h1>Les films</h1>
            <p>Intègre les films sur 4 colonnes avec une carte (image, titre, durée, catégorie, photo)</p>
            <p>L'intégration devra se faire dans un composant qui aura pour props le movie</p>
            <div class="row row-cols row-cols-sm-1 row-cols-md-2 row-cols-lg-4 my-5">
                {movies.map(movie =>
                    <Movie key={movie.id} movie={movie} />
                )}
            </div>
        </div>
    );
}

export default MovieList;