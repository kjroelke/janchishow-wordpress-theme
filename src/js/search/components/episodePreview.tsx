import React from 'react';
import PostThumbnail from './postThumbnail';

export default function EpisodePreview( { post } ) {
	let type: 'Interview' | 'Solo' | 'Bonus' | null = null;
	switch ( post[ 'podcast-type' ][ 0 ] ) {
		case 190:
			type = 'Solo';
			break;
		case 191:
			type = 'Interview';
			break;
		case 192:
			type = 'Bonus';
			break;
		default:
			type = null;
	}
	const tags = false;
	return (
		<div className="col-auto gx-0 card">
			<PostThumbnail post={ post } />
			<div className="card-body d-flex flex-column">
				<h2 className="card-title">{ post.title.rendered }</h2>
				<div className="card-text mb-2">
					{ type && (
						<p>
							Podcast Type:{ ' ' }
							<a href={ `/podcast-type/${ type.toLowerCase() }` }>
								{ type }
							</a>
						</p>
					) }
					{ tags && (
						<p>
							Topics in this episode:{ ' ' }
							{ tags.map( ( tag ) => (
								<a href={ `/podcast-type/${ tag.slug }` }>
									{ tag.name }
								</a>
							) ) }
						</p>
					) }
				</div>
				<a
					href={ `/${ post.slug }` }
					className="btn btn-primary mt-auto align-self-start"
				>
					Listen Now
				</a>
			</div>
		</div>
	);
}
