import React from 'react';
import { createRoot } from 'react-dom/client';
import useGetData from './hooks/useGetData';
import EpisodePreview from './components/episodePreview';
import LoadingSpinner from './components/LoadingSpinner';

const app = document.getElementById( 'app' );
createRoot( app ).render( <App /> );

function App() {
	const { isLoading, data } = useGetData(
		`${ tjsSiteData.rootUrl }/wp-json/wp/v2/episodes`
	);

	return isLoading ? (
		<div className="container my-5 py-5">
			<LoadingSpinner />
		</div>
	) : (
		<>
			<header
				style={ { backgroundColor: `var(--color-blue)` } }
				className="text-white"
			>
				<div className="container pt-5">
					<div className="row text-center">
						<h1>Episode Archive</h1>
					</div>
					<aside className="row text-center">
						<p>Search for an episode</p>
					</aside>
				</div>
			</header>
			<div className="row row-cols-lg-4 row-cols-1 justify-content-center gap-3 my-5">
				{ data.map( ( post ) => (
					<EpisodePreview post={ post } />
				) ) }
			</div>
		</>
	);
}
