import { useState } from "react";

function Movie({ movie }) {
    const [showSynopsys, setshowSynopsys] = useState(false);
    const [voirLire, setVoirLire] = useState('Lire');

    const showDescription = () => {
        setshowSynopsys(!showSynopsys);

        if (showSynopsys) {
            setVoirLire('Lire');
        } else {
            setVoirLire('Voir');
        }
    }

    return (
        <div>
            <div className="card col d-flex flex-column mb-4">
                <img className="object-fit-cover card-img" src={movie.cover} alt="" />
                <div className="card-body shadow">
                    <div className="d-flex flex-column justify-content-between flex-grow-1">
                        <h4 className="text-center m-3">{movie.title}</h4>
                        <div className="d-flex justify-content-around">
                            <div>⏲ {movie.duration}</div>
                            <div>|</div>
                            <div>📂 {movie.category.name}</div>
                        </div>
                        <div className="text-center">
                            <button onClick={showDescription} className="btn btn-dark my-3 w-50">{ voirLire }</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Movie;
